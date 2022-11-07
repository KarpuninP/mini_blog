<?php

namespace App\Utils\Base;

use App\Utils\Db;

abstract class Model {

    public function __construct() {
        // Подключаем файл DB
        Db::instance();
    }
}