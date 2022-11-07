<?php

namespace App\Utils;

use RedBeanPHP\RedException;

class Db
{
// Будем реализовывать патерн синглтон
    use TSingletone;

    /**
     * @throws RedException
     * @throws \Exception
     */
    protected function __construct()
    {
        // Конфигурационные файлы нашей бд засовываем в переменную для подключения
        $db = require_once CONF . '/config_db.php';
        // var_dump($db );
        // подключаем RedBeanPHP
        class_alias('\RedBeanPHP\R', '\R');
        \R::setup($db['dsn'], $db['user'], $db['pass']);
        // Проверяем если установленное соединение, если нет то выкидываем исключение.
        //  Благодаря данной библиотеке мы можем проверить
        if (!\R::testConnection()) {
            throw new \Exception("Нет соединения с БД", 500);
        }
        // Больше функций RedBeanPHP в продакшене нам ненужны (например менять таблицу на ходу) и когда проект в продакшене
        // их надо заморозить для этого будем использовать функцию этой библиотеке \R::freeze(true)
        // https://redbeanphp.com/index.php?p=/fluid_and_frozen
        // если у нас freeze будет true, значит многие функции redbeanphp будут отключены
        \R::freeze(!DEBUG);
        if (DEBUG) {
            // это дебаг режим красивый если DEBUG = DEBUG (режим разработки) значит мы увидим запрос таблице
            \R::debug(TRUE, 1);
        }
    }
}