<?php
//    var_dump($_POST);  // проверка что приходит
//    exit();

if (isset($_POST['send'])) {

    // Задаем переменные и проверяем пришло ли если нет то задаем пустую строку (тернарные операторы)
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $index = isset($_POST['index']) ? $_POST['index'] : '';
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';

    // Валидация пришедших данных
    // Проверка переменой $type
    if (!$type || $type != 'theory' &&  $type != 'practice') {
        header('Location: http://localhost:8000');
        // Записываем в файл, дату и название ошибки. Прерываем исполнение кода
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Ошибка, несоответствует $type заданным параметрам.Файл add_backend.php' . "\r";
        file_put_contents('../database/error.txt', $message, FILE_APPEND);
        exit;
    }

    // Проверка переменой $index
    $lendIndex = strlen($index);
    if (!$lendIndex || $lendIndex < 0 || $lendIndex > 250) {
        header('Location: http://localhost:8000');
        // Записываем в файл, дату и название ошибки. Прерываем исполнение кода
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Ошибка, несоответствует $index заданным параметрам.Файл add_backend.php' . "\r";
        file_put_contents('../database/error.txt', $message, FILE_APPEND);
        exit;
    }

    // Проверка переменой $index
    $lendComment = strlen($comment);
    if (!$lendComment || $lendComment < 0 || $lendComment > 50000) {
        header('Location: http://localhost:8000');
        // Записываем в файл, дату и название ошибки. Прерываем исполнение кода
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Ошибка, несоответствует $comment заданным параметрам.Файл add_backend.php' . "\r";
        file_put_contents('../database/error.txt', $message, FILE_APPEND);
        exit;
    }

    // Убираем возможность подставить вредоносный код (кодируем/экранируем спец. символы)
    $index = filter_var($index, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $comment = filter_var($comment, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Функция по добавлению комментариев, см. ниже
    addComment($type, $index, $comment );
    // Возвращаемся на страницу добавление комментариев и завершаем код
   header('Location: http://localhost:8000/add.php');
    exit;
// Иначе Переходим на главную страницу и записываем ошибку
} else {
    header('Location: http://localhost:8000');
    // Записываем в файл, дату и название ошибки. Прерываем исполнение кода
    $date = date("Y-m-d H:i:s");
    $message = $date . ' - ' . 'Ошибка, данные поступили не через кнопку.Файл add_backend.php' . "\r";
    file_put_contents('../database/error.txt', $message, FILE_APPEND);
    exit;
}

// Функция по добавлению комментариев в бд
function addComment(string $type, string $index, string $comment) {

    // Если в $type пришло theory, то мы запускаем функцию addCommentStandardForm() (см. ниже)
        if ($type == 'theory') {
            // Подставляем в какую базу данных использовать
            addCommentStandardForm('commentsTheory.json', $type, $index, $comment);
            header('Location: http://localhost:8000/index.php');
            exit;
        //  Иначе тоже запускаем эту функцию, но меняем имя БД
        } else {
            addCommentStandardForm('commentsPractice.json', $type, $index, $comment);
            header('Location: http://localhost:8000/practice.php');
            exit;
        }
}

// Функция по добавлению комментариев в бд с добавлением $nameBD
function addCommentStandardForm (string $nameBD, string $type, string $index, string $comment) {

    // Достаем файл, подставляя правильное имя
    $str = file_get_contents("../database/$nameBD");
    // Декодируем его
    $posts = json_decode($str, 1);
    // Задаем правильный id с помощь функции addId(), см. ниже и прибавляем 1 для следующего комментария
    $id = addId($type) + 1;

    // Записываем массив и ключом который должно заменить
    $posts[] = [
        'id' => $id,
        'type' => $type,
        'index' => $index,
        'comment' => $comment
    ];

    // записываем в файл в формат json и сохраняем его в БД с указанным именем файла
    $str = json_encode($posts);
    file_put_contents("../database/$nameBD", $str);
}

// добавление ключа id
function addId(string $type) {

    // Узнаем какая выбранная тема
    if ($type == 'theory') {
        $str = file_get_contents('../database/commentsTheory.json');
        $posts = json_decode($str, 1);
    }else {
        $str = file_get_contents('../database/commentsPractice.json');
        $posts = json_decode($str, 1);
    }

    // Проходимся циклом по массиву и выберем от туда все id
    foreach ($posts as $key => $value) {
        $id = $value['id'];
    }

    // Если не находим id, то подставляем 0, если находим, то его возвращаем
    if ($id === null) {
        $id = 0;
    } else {
        $id = $value['id'];
    }

    return $id;

}


