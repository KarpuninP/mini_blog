<?php

namespace App\Utils;

class Db
{
// будем реулизовываьт патерн синглтон
    use TSingletone;

    protected function __construct()
    {
        // Конфигурационные файлы нашей бд засовываем в переменую для подключение
        $db = require_once CONF . '/config_db.php';
        // var_dump($db );
        // подключаем RedBeanPHP
        class_alias('\RedBeanPHP\R', '\R');
        \R::setup($db['dsn'], $db['user'], $db['pass']);
        // проверяем если установленое соединение, если нет то выкидываем исключение.
        //  Благодоря данной библеотеке мы можем проверить
        if (!\R::testConnection()) {
            throw new \Exception("Нет соединения с БД", 500);
        }else{
            // запись в логе
            error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: Соединение установлено с БД \n=================\n", 3, ROOT . '/tmp/errors.log');
        }
        // Больше функций RedBeanPHP в продакшене нам ненужны (например менять таблицу на ходу) и когда проэкт в продакшене
        // их надо заморозить для этого будем использовать функцию этой библеотеке \R::freeze(true)
        // https://redbeanphp.com/index.php?p=/fluid_and_frozen
        // если у нас freeze будет true, значит многие функции redbeanphp будут отключены
        \R::freeze(!DEBUG);
        if (DEBUG) {
            // это дебак режим красивый если DEBUG = DEBUG (режим разработки) значит мы увидем запрос таблици
            \R::debug( TRUE, 1 );
        }
    }
}