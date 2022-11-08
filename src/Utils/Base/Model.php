<?php

namespace App\Utils\Base;

use App\Utils\Db;

abstract class Model {

    public function __construct() {
        // Connecting the DB file
        Db::instance();
    }
}