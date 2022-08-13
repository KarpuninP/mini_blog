<?php

namespace App\Utils\Base;

use App\Utils\Db;

abstract class Model {

    // масив свойств мадели которые будет индетичен полям баз данных (нужно что бы загружать из форм)
    public $attributes = [];
    // Для ошибок
    public $errors = [];
    // Для правел валидации данных
    public $rules = [];

    public function __construct() {
        // Подключаем фаил DB
        Db::instance();
    }


}