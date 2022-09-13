<?php

namespace App\Controller;

use App\Utils\Base\Controller;

class ModalController extends Controller
{
    public function index()
    {
       //var_dump($_GET['id']);
        //var_dump(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest');
//        $data = [$_GET];
        require VIEW . '/modal.php';
      // echo 'hi';
//        redirect('http://localhost/');

        //echo 'ok';
        //redirect();
//res - это ответ
    }
}