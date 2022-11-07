<?php

namespace App\Utils;

trait TSingletone
{
    // создаем свойства приватное, это свойства заполняем объектом класса
    public static $instance;

    public static function instance (): object
    {
        // Если у нас свойства instance пусто, то тогда мы в него положим объект нового класса.
        // Если он не пустой, то тогда мы его возвращаем. Вернем этот самый объект
        if(self::$instance === null)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }
}