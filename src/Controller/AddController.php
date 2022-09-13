<?php

namespace App\Controller;

use App\Model\Blog;
use App\Utils\Base\Controller;

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
     * @throws \RedBeanPHP\RedException\SQL
     */
    // Главная страница
    public function index(): void
    {
        // Проверяем каким методом пришёл запрос
        //var_dump($_SERVER['REQUEST_METHOD']);
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data = [
                'namePage' => 'Добавить текст в блог',
                'descriptionPage' => 'Тут можно добавить текст в блог. С заданной тематикой и разделом'
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

        // смотрим что у нас в дате файле
        var_dump($data);
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
     * @throws \RedBeanPHP\RedException\SQL
     * @throws \Exception
     */
    // Начало, просмотреть по поводу переадресации на другой метод и вывод модального окна, что все загружено
    public function start(): int|string
    {

        //var_dump($_POST);
        if (isset($_POST['send'])) {
            // Задаем переменные и проверяем пришло ли если нет то задаем пустую строку (тернарные операторы)
            $type = isset($_POST['type']) ? $_POST['type'] : '';
            $themes = isset($_POST['themes']) ? $_POST['themes'] : '';
            $postId = isset($_POST['postId']) ? $_POST['postId'] : '';
            $index = isset($_POST['index']) ? $_POST['index'] : '';
            $comment = isset($_POST['comment']) ? $_POST['comment'] : '';

            // Запускаем метод обновить или добавить
           $data = $this->add($type, $themes, $postId, $index, $comment);

        }elseif (isset($_POST['dell'])) {
            // Задаем переменные и проверяем пришло ли если нет то задаем пустую строку (тернарные операторы)
            $postId = isset($_POST['postId']) ? $_POST['postId'] : '';
            $type = isset($_POST['type']) ? $_POST['type'] : '';

            $this->dell($type, $postId);
            $data = 0;
        }else {
           throw new \Exception("It came in other ways (hacking)", 500);
        }
        return $data ;
    }

    /**
     * @throws \RedBeanPHP\RedException\SQL
     * @throws \Exception
     */
    // Создает или обновляет таблицу
    public function add(string $type, string $themes, int $postId, string $index, string $comment): int|string
    {
        // Проверяем что пришло
        // var_dump($type, $themes, $postId, $index, $comment);
       $data = $this->validation($type, $themes, $postId, $index, $comment);
       //var_dump($data);

        // Если в $postId что то есть значит запустим метод обновить, если нет то создать (дописать)

      // Запускаем в модель Blog() метод create и передаем туда проваледированые данные
      $tableId = $this->nameModal->create($data['type'], $data['themes'], $data['index'], $data['comment']);
      //var_dump($tableId);
      return $tableId;
    }



    /**
     * @throws \Exception
     */
    // Валидация пришедших данных
    public function validation(string $type, string $themes, int $postId, string $index, string $comment): array
    {

        // Проверка переменой $type
        if (!$type || $type != 'theory' &&  $type != 'practice') {
            // Выкидываем ошибку
            throw new \Exception("Ошибка, несоответствует $type заданным параметрам.", 500);
        }

        // Проверка переменой $themes
        $lendThemes = strlen($themes);
        if (!$lendThemes || $lendThemes < 0 || $lendThemes > 50) {
            // Выкидываем ошибку
            throw new \Exception("Ошибка, несоответствует оглавление заданным параметрам.", 500);
        }

        if (!is_numeric($postId) && $postId !== '') {
            // Выкидываем ошибку
            throw new \Exception("Ошибка, несоответствует оглавление заданным параметрам.", 500);
        }

        // Проверка переменой $index
        $lendIndex = strlen($index);
        if (!$lendIndex || $lendIndex < 0 || $lendIndex > 250) {
            // Выкидываем ошибку
            throw new \Exception("Ошибка, несоответствует оглавление заданным параметрам.", 500);
        }

        // Проверка переменой $index
        $lendComment = strlen($comment);
        if (!$lendComment || $lendComment < 0 || $lendComment > 50000) {
            throw new \Exception("Ошибка, несоответствует текст заданным параметрам.Файл add_backend.php", 500);
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

    public function dell(string $type, int $postId)
    {
       echo 'удалино ' . $postId;

    }
}