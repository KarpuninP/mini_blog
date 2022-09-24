<?php
// Error output
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

// Start session
session_start();

// check session
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

// Take data
$dataPractice = file_get_contents('database/commentsPractice.json');
// Decoder
$dataPractice = json_decode($dataPractice, 1);
if ($dataPractice == null) {
    $dataPractice = [];
}

// Take data
$dataTheory = file_get_contents('database/commentsTheory.json');
// Decoder
$dataTheory = json_decode($dataTheory, 1);
if ($dataTheory == null) {
    $dataTheory = [];
}

//var_dump($dataTheory);
//var_dump($dataPractice);

