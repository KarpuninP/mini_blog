<?php
// Проверяем что пришло
//var_dump($_POST);
//exit();

// Проверка, что данные пришли через кнопку send
if (isset($_POST['send'])) {

    // Задаем переменные и проверяем пришло ли если нет то задаем пустую строку (тернарные операторы)
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $postId = isset($_POST['postId']) ? $_POST['postId'] : '';
    $index = isset($_POST['index']) ? $_POST['index'] : '';
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';

    // Валидация пришедших данных
    // Проверка переменой $type
    if (!$type || $type != 'theory' &&  $type != 'practice') {
        header('Location: http://localhost:8000');
        // Записываем в файл, дату и название ошибки. Прерываем исполнение кода
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Ошибка, несоответствует $type заданным параметрам.Файл edit_backend.php' . "\r";
        file_put_contents('../database/error.txt', $message, FILE_APPEND);
        exit;
    }
    // Проверка переменой $postId
    if (!$postId && $postId > 0 && !is_numeric($postId)) {
        header('Location: http://localhost:8000');
        // Записываем в файл, дату и название ошибки. Прерываем исполнение кода
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Ошибка, несоответствует $postId заданным параметрам.Файл edit_backend.php' . "\r";
        file_put_contents('../database/error.txt', $message, FILE_APPEND);
        exit;
    }
    // Проверка переменой $index
    $lendIndex = strlen($index);
    if (!$lendIndex || $lendIndex < 0 || $lendIndex > 250) {
        header('Location: http://localhost:8000');
        // Записываем в файл, дату и название ошибки. Прерываем исполнение кода
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Ошибка, несоответствует $index заданным параметрам.Файл edit_backend.php' . "\r";
        file_put_contents('../database/error.txt', $message, FILE_APPEND);
        exit;
    }

    // Проверка переменой $comment
    $lendComment = strlen($comment);
    if (!$lendComment || $lendComment < 0 || $lendComment > 50000) {
        header('Location: http://localhost:8000');
        // Записываем в файл, дату и название ошибки. Прерываем исполнение кода
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Ошибка, несоответствует $comment заданным параметрам.Файл edit_backend.php' . "\r";
        file_put_contents('../database/error.txt', $message, FILE_APPEND);
        exit;
    }

    // Убираем возможность подставить вредоносный код (кодируем/экранируем спец. символы)
    $index = filter_var($index, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $comment = filter_var($comment, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Функция по редактированием комментариев (см. функцию editComment())
    editComment($postId, $type, $index, $comment);

// Проверка, что данные пришли через кнопку delete
}elseif (isset($_POST['delete'])) {

    // Задаем переменные и проверяем пришло ли если нет то задаем пустую строку (тернарные операторы)
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $postId = isset($_POST['postId']) ? $_POST['postId'] : '';

    // Валидация пришедших данных
    // Проверка переменой $type
    if (!$type || $type != 'theory' &&  $type != 'practice') {
        header('Location: http://localhost:8000');
        // Записываем в файл, дату и название ошибки. Прерываем исполнение кода
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Ошибка, несоответствует $type заданным параметрам.Файл edit_backend.php' . "\r";
        file_put_contents('../database/error.txt', $message, FILE_APPEND);
        exit;
    }
    // Проверка переменой $postId
    if (!$postId && $postId > 0 && !is_numeric($postId)) {
        header('Location: http://localhost:8000');
        // Записываем в файл, дату и название ошибки. Прерываем исполнение кода
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Ошибка, несоответствует $postId заданным параметрам.Файл edit_backend.php' . "\r";
        file_put_contents('../database/error.txt', $message, FILE_APPEND);
        exit;
    }
    // Функция по удалению комментариев (см. функцию delComment())
    delComment($type, $postId);

// иначе переходим на главную страницу и записываем отчет об ошибке
} else {
    header('Location: http://localhost:8000');
    // Записываем в файл, дату и название ошибки. Прерываем исполнение кода
    $date = date("Y-m-d H:i:s");
    $message = $date . ' - ' . 'Ошибка, данные поступили не через кнопку.Файл edit_backend.php' . "\r";
    file_put_contents('../database/error.txt', $message, FILE_APPEND);
    exit;
}

// Редактируем комментарий в базу данных
function editComment(int $postId ,string $type, string $index, string $comment) {

    // Если в $type пришло theory, то мы запускаем функцию editCommentStandardForm() (см. ниже)
    if ($type == 'theory') {
        // Подставляем в какую базу данных использовать
        editCommentStandardForm('commentsTheory.json', $postId ,$type, $index, $comment);
        header('Location: http://localhost:8000/index.php');
        exit;
    //  Иначе тоже запускаем эту функцию, но меняем имя БД
    } else {
        editCommentStandardForm('commentsPractice.json', $postId ,$type, $index, $comment);
        header('Location: http://localhost:8000/practice.php');
        exit;
    }
}

// Редактируем комментарий в базу данных с добавлением имени БД
function editCommentStandardForm(string $nameBD, int $postId ,string $type, string $index, string $comment) {

    // Достаем фаил, подставляя правильное имя
    $str = file_get_contents("../database/$nameBD");
    // Декодируем его
    $posts = json_decode($str, 1);
    // Отнимаем единицу для получения ключа в массиве
    $idKey = $postId - 1;

    // Записываем массив и ключом который должно заменить
    $editPost[$idKey] = [
        'id' => $postId,
        'type' => $type,
        'index' => $index,
        'comment' => $comment
    ];

    // Переписываем переменную $posts с помощь функции для массива заменяя наш массив на редактированный
    $posts = array_replace($posts, $editPost);
    // записываем в файл в формат json и сохраняем его в БД с указанным именем файла
    $str = json_encode($posts);
    file_put_contents("../database/$nameBD", $str);
}

// Функция по удалению из массива комментариев
function delComment (string $type, int $postId) {

    // Если переменная $type равно theory то $nameBD мы подставляем commentsTheory.json и запускаем функцию del() см. ниже
    if ($type == 'theory') {
        $nameBD = 'commentsTheory.json';
        del($nameBD, $postId);
        header('Location: http://localhost:8000/index.php');
        exit;
    // Иначе меняем имя файла для записи и вызываем функцию del(), переходим на страницу и завершаем код
    } else {
        $nameBD = 'commentsPractice.json';
        del($nameBD, $postId);
        header('Location: http://localhost:8000/practice.php');
        exit;
    }
}

// Функция по удалению комментариев
function del(string $nameBD, int $postId) {

    // Распаковываем и сохраняем масив в $posts
    $str = file_get_contents("../database/$nameBD");
    $posts = json_decode($str, 1);
    // Отнимаем единицу, что бы получить номер массива
    $idKey = $postId - 1;
    // Удаляем пост в массиве
    unset($posts[$idKey]);
    // записываем в файл
    $str = json_encode($posts);
    file_put_contents("../database/$nameBD", $str);
}
