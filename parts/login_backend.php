<?php

// Ставим начало сессию, что бы запомнить пользователя
session_start();
//var_dump($_POST);
// С помощью var_dump($_POST); надо сделать проверку правильно ли я все заполнил
//Проверка на нажатие кнопки send
if (isset($_POST['send'])) {

    //Далее все данных ложем в переменную и проверяем
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Сначала делаем проверку на валидация, а потом уже ставим правильные теги в html
    //Проверка на заполнение
    if (!$email || !$password) {
        // Перенаправление на index.php
        header('Location: http://localhost:8000');
        // Записываем в файл, дату и название ошибки. Прерываем исполнение кода
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Ошибка, пустые поля в логине и пароле.Файл login_backend.php' . "\r";
        file_put_contents('database/error.txt', $message, FILE_APPEND);
        exit;
    }
    // Проверяем на правильность написание мыло
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Перенаправление на index.php
        header('Location: http://localhost:8000');
        // Записываем в файл, дату и название ошибки. Прерываем исполнение кода
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Ошибка, не правильный формат имела.Файл login_backend.php' . "\r";
        file_put_contents('database/error.txt', $message, FILE_APPEND);
        exit;
    }
    // Выставляем длину пароля с помощью функции strlen
    $lendPassword = strlen($password);
    if ($lendPassword < 3 || $lendPassword > 8) {
        // Перенаправление на index.php
        header('Location: http://localhost:8000');
        // Записываем в файл, дату и название ошибки. Прерываем исполнение кода
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Ошибка, неправленая длина пароля.Файл login_backend.php' . "\r";
        file_put_contents('database/error.txt', $message, FILE_APPEND);
        exit;
    }
    // Валидация закончилось и переходим на работу с данными
    // читаем файл, где лежит база в строковом представление
    $data = file_get_contents('../database/db.json');
    // преобразуем строку в массив php
    $db = json_decode($data, 1);
    // если файл был пустой, то он вернет null, значит закидываем его в пустой массив $db = [];
    if ($db == null) {
        $db = [];
    }
    //Создаем цикл и ищем пользователя
    foreach ($db as $user) {
        // Если мы нашли пользователя и пароль его совпадает, то закидываем его в сессию и
        // тогда посылаем его на главную страницу и завершаем код
        if ($user['email'] == $email && $user['password'] == $password) {
            $_SESSION['isLogin'] = true;
            $date = date("Y-m-d H:i:s");
            $message = $date . ' - ' . 'Пользователь залогиниться по имейлу ' . $email . "\r";
            file_put_contents('../database/error.txt', $message, FILE_APPEND);
            header('Location: http://localhost:8000');
            exit;
        }else {
            $date = date("Y-m-d H:i:s");
            $message = $date . ' - ' . 'Был веден неправильный имейлу: ' . $email . ' и пароль: ' . $password . "\r";
            file_put_contents('../database/error.txt', $message, FILE_APPEND);
            header('Location: http://localhost:8000');
            exit;
        }
    }
}