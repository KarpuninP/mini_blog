<?php

namespace App\Utils;

trait TSingletone
{
    // We create private properties, we fill these properties with a class object
    public static $instance;

    public static function instance (): object
    {
        // If our instance properties are empty, then we will put an object of a new class in it.
        // If it's not empty, then we return it. Let's return this very object
        if(self::$instance === null)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }
}