<?php

namespace App\Controller;

use App\Utils\Base\Controller;

class ModalController extends Controller
{
//    Подключение шаблона регистрации
    public function signUp()
    {
        require_once VIEW . '/login/sign_up.template.php';
    }

//    Подключение шаблона входа
    public function signIn()
    {
        require_once VIEW . '/login/sign_in.template.php';
    }
}