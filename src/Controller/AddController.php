<?php

namespace App\Controller;

use App\Model\Blog;
use App\Utils\Base\Controller;
use Exception;
use JetBrains\PhpStorm\ArrayShape;
use RedBeanPHP\RedException\SQL;

class AddController extends Controller
{
    public function  __construct()
    {
        // при добавлении в конструктор его подключаем, то что было в родительском классе
        parent::__construct();
        // Создаем Модельку и добавляем его в свойства
        $this->nameModal = new Blog();
    }

    /**
     * @throws SQL
     */
    // Главная страница
    public function index(): void
    {
        // Проверяем каким методом пришёл запрос
        //var_dump($_SERVER['REQUEST_METHOD']);
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // обязательный часть
            $data = [
                'namePage' => 'Добавить текст в блог',
                'descriptionPage' => 'Тут можно добавить текст в блог. С заданной тематикой и разделом',
                'themesList' => $this->themesList()
            ];

        }else {
            // Запускаем метод start(), он возвращает id поста
            $idPost = $this->start();

            // Создаем сообщение для descriptionPage сообщение отправлено в бд да или нет
            $false = [
                'namePage' => 'Сообщение !!!',
                'descriptionPage' => 'Поздравляю ваше текст был отправлен в базу данных. Все прошло успешно!',
                'error' => false
            ];

            $true = [
                'namePage' => 'Сообщение !!!',
                'descriptionPage' => 'К сожалению ваше сообщение не было записано в базу данных.',
                'error' => true
            ];

            // Проверяем если пришло число и неравно 0 значит сообщение отправлено
            $data= (is_numeric($idPost) && $idPost != 0)  ? $false : $true;
            // Если выйдет ошибка запишем ее в лог
            if($data['error']) {
                error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: По какой то причине, недобавлнена запись в бд | Файл: src/Controller/AddController.php, метод index  \n=================\n", 3, ROOT . '/tmp/errors.log');
            }
        }
        $data['link'] = 'add';
        // смотрим что у нас в дате файле
//      var_dump($data);
        // обязаловка для возврата странице
        // мета данные
        $this-> setMeta (
            'Главная страница',
            'тут содержится данные про сдачу собеседование',
            'Собеседование на php, ответы на собеседование'
        );
        // возвращает к подключению шаблон и передача данных
        $this-> view('add.add', $data);
    }

    /**
     * @throws SQL
     * @throws Exception
     */
    // Начало, просмотреть по поводу переадресации на другой метод и вывод модального окна, что все загружено
    public function start(): int|string
    {
        //var_dump($_POST);
        if (isset($_POST['send'])) {
            // Задаем переменные и проверяем пришло ли если нет то задаем пустую строку (тернарные операторы)


            // Запускаем метод обновить или добавить
            $data = $this->add($_POST);
// Если нажата кнопка на редактирование
        } elseif (isset($_POST['edit'])) {
            // Проверяем что получили и отправляем на метод редактирование
//            var_dump($_POST);
            $data = $this->edit($_POST);
//  Если нажата кнопка удалить
        } elseif (isset($_POST['dell'])) {
            // Проверяем что получили и отправляем на метод удаление
//            var_dump($_POST);
            $data = $this->dell($_POST);
        } else {
            throw new Exception("It came in other ways (hacking)", 500);
        }
        return $data ;
    }

    /**
     * @throws SQL
     * @throws Exception
     */
    // Создает или обновляет таблицу
    public function add(array $post): int|string
    {
        // Проверяем что пришло
        // var_dump($post);
        $data = $this->validation($post);
        //var_dump($data);

        // Запускаем в модель Blog() метод create и передаем туда проваледированые данные
        return $this->nameModal->create($data['type'], $data['themes'], $data['index'], $data['comment']);
    }

    /**
     * @throws Exception
     */
    // Валидация пришедших данных
    #[ArrayShape(['type' => "mixed|string", 'themes' => "mixed", 'postId' => "int|null|string", 'index' => "mixed", 'comment' => "mixed"])]
    public function validation(array $post): array
    {
        // Если нет, то подставляем пустую строку
        $type = $post['type'] ?? '';
        $themes = $post['themes'] ?? '';
        $postId = $post['postId'] ?? '';
        $index = $post['index'] ?? 'index';
        $comment = $post['comment'] ?? 'text';

        // Проверка переменой $type
        if ($type != 'theory' && $type != 'practice') {
            // Выкидываем ошибку
            throw new Exception("Ошибка, несоответствует $type заданным параметрам.", 500);
        }

        // Проверка переменой $themes
        $lendThemes = strlen($themes);
        if (!$lendThemes || $lendThemes <= 0 || $lendThemes > 50) {
            // Выкидываем ошибку
            throw new Exception("Ошибка, несоответствует оглавление заданным параметрам.", 500);
        }

        if (!is_numeric($postId) && $postId !== '') {
            // Выкидываем ошибку
            throw new Exception("Ошибка, несоответствует оглавление заданным параметрам.", 500);
        }

        // Проверка переменой $index
        $lendIndex = strlen($index);
        if (!$lendIndex || $lendIndex <= 0 || $lendIndex > 250) {
            // Выкидываем ошибку
            throw new Exception("Ошибка, несоответствует оглавление заданным параметрам.", 500);
        }

        // Проверка переменой $index
        $lendComment = strlen($comment);
        if (!$lendComment || $lendComment < 0 || $lendComment > 50000) {
            throw new Exception("Ошибка, несоответствует текст заданным параметрам.Файл add_backend.php", 500);
        }

        // Убираем возможность подставить вредоносный код (кодируем/экранируем спец. символы)
        $themes = filter_var($themes, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $index = filter_var($index, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $comment = filter_var($comment, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        return [
            'type' => $type,
            'themes' => $themes,
            'postId' => $postId,
            'index' => $index,
            'comment' => $comment
        ];

    }

//
    public function themesList(): ?array
    {
        return $this->nameModal->taglist();
    }

    /**
     * @throws Exception
     */
//    Редактировать пост
    public function edit(array $post): int
    {
        // Валидация данных
        $data = $this->validation($post);
//        var_dump($data);
        return $this->nameModal->edit($data['postId'], $data['type'], $data['index'], $data['comment']);
    }

    /**
     * @throws Exception
     */
    // Удалить пост
    public function dell(array $post): int
    {
//        var_dump($post);
        // Валидация данных
        $data = $this->validation($post);
        // Запускаем удаление, получаем 1 удалино, 0 неудалино
        return $this->nameModal->remove($data['postId'], $data['type'], $data['themes']);
    }
}