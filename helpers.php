<?php

// Тут будем писать какие-то функции которые будут вне классов и их можно будет в любом момент дергать.
// Функция для дебага (типа var_dump();)
use JetBrains\PhpStorm\NoReturn;

function debug($arr) {
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

// Функция перенаправление
#[NoReturn]
function redirect($http = false) {
    if($http) {
        // если у нас есть какой-то адрес, то сделаем редирект на него
        $redirect = $http;
    }else {
        // если нечего не передали, то надо обновить страницу f5 туда откуда он пришёл
        // если в массиве сервер (адрес который он пришёл) если нет, то на главную страницу
        $redirect = $_SERVER['HTTP_REFERER'] ?? PATH;
    }
    // И отправят нас на страницу которая получилось выше
    header("Location: $redirect");
    exit;
}


