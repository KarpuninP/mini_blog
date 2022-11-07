<?php

namespace App\Controller;

use RedBeanPHP\OODBBean;
use RedBeanPHP\RedException\SQL;


class EditController extends AddController
{
    /**
     * @throws SQL
     * @throws \Exception
     */
    public function index(): void
    {
        // Проверяем каким методом пришёл запрос
        //var_dump($_SERVER['REQUEST_METHOD']);
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data = $this->validation($_GET);
//            var_dump( $data );
            $editPost = null;
            if ($data['postId'] !== '') {
                $editPost = $this->findPost($data['postId'], $data['themes'], $data['type']);
            }

            if (is_null($editPost)) {
                // обязательный часть
                $data = [
                    'namePage' => 'Ошибка, такого поста не найдено',
                    'descriptionPage' => 'Вы можете написать новый пост или повторите действие еше раз',
                    'link' => 'add'
                ];
            } else {
                // обязательный часть и дополнительные данные
                $data = [
                    'namePage' => 'Редактировать текст в блоге',
                    'descriptionPage' => 'Редактируем текс в блоге',
                    'link' => 'edit',
                    'themes' => $data['type'],
                    'tag' => $data['themes'],
                    'editPost' => $editPost
                ];
            }

            // тут изменить для обновления
        } else {
            // Запускаем метод start(), он возвращает id поста
            $idPost = $this->start();
//            var_dump($idPost);
            // Создаем сообщение для descriptionPage сообщение отправлено в бд да или нет
            $false = [
                'namePage' => 'Сообщение !!!',
                'descriptionPage' => 'Поздравляю ваше текст был отредактирован. Все прошло успешно!',
                'link' => 'add',
                'error' => false
            ];

            $true = [
                'namePage' => 'Сообщение !!!',
                'descriptionPage' => 'К сожалению ваше сообщение не было отредактировано.',
                'link' => 'add',
                'error' => true
            ];

            // Проверяем если пришло число и неравно 0 значит сообщение отправлено
            $data = (is_numeric($idPost) && $idPost != 0) ? $false : $true;
            // Если выйдет ошибка запишем ее в лог
            if ($data['error']) {
                error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: По какой то причине, недобавлнена запись в бд | Файл: src/Controller/AddController.php, метод index  \n=================\n", 3, ROOT . '/tmp/errors.log');
            }
        }

        // смотрим что у нас в дате файле
//        var_dump($data);
        // обязаловка для возврата странице
        // мета данные
        $this->setMeta(
            'Редактирование поста',
            'тут можно отредактировать пост',
            'Собеседование на php, ответы на собеседование'
        );
        // возвращает к подключению шаблон и передача данных
        $this->view('add.add', $data);
    }

    // Находит пост из бд который надо отредактировать, что бы загрузить на страничку
    public function findPost(int $id, string $tag, string $themes): OODBBean|null
    {
        return $this->nameModal->findPost($id, $tag, $themes);
    }
}