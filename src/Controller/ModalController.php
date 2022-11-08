<?php

namespace App\Controller;

use App\Utils\Base\Controller;

class ModalController extends Controller
{
//    Connecting a registration template
    public function signUp()
    {
        require_once VIEW . '/login/sign_up.template.php';
    }

//    Connecting a login template
    public function signIn()
    {
        require_once VIEW . '/login/sign_in.template.php';
    }
}