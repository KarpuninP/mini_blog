<?php
// Вывод ошибок, на продакшене его убираем
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();  // запуск сесии



// проверка сесии и что надо отображать
if (!isset($_SESSION['isLogin'])) {
    $login =  'Войти';
    $addUrl = '';
    $addText = '';
    $edit = '';
}else {
    $login =  '' ;
    $addUrl = '../add.php ';
    $addText = 'Добавить';
    $edit = 'редактировать';
}

// Распаковка с БД для заполнения страница
$dataPractice = file_get_contents('database/commentsPractice.json');
// Преобразуем строку в массив php
$dataPractice = json_decode($dataPractice, 1);
if ($dataPractice == null) {
    $dataPractice = [];
}

$dataTheory = file_get_contents('database/commentsTheory.json');
// Преобразуем строку в массив php
$dataTheory = json_decode($dataTheory, 1);
if ($dataTheory == null) {
    $dataTheory = [];
}

//var_dump($dataTheory);
//var_dump($dataPractice);

