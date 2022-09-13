<?php

namespace App\Utils\Base;

use App\Utils\Db;

abstract class Model {


    public function __construct() {
        // Подключаем фаил DB
        Db::instance();
    }


}