<?php

namespace App\Controller;


use App\Model\Blog;
use App\Utils\App;
use App\Utils\Base\Controller;
use App\Utils\Registry;

class HomeController extends Controller
{

    public function  __construct()
    {
        // если нужено в конструкторе что то добавить пишем это
        parent::__construct();

    }

    // Главная страница
    public function index()
    {





      // обезаловка для возрата странице
      // мета данные
      $this-> setMeta (
          'Главная страница',
          'тут содержится данные про сдачу собеседование',
          'Собеседование на php, ответы на собеседование'
      );
      // возрашает к подключение шаюлон и передача данных
      $this-> view('main.main');
    }

    public function p(): void
    {
        echo 'hi';

    }

    // этот метод нужен для кастыля что бы незабивать лог.... баг  который немогу понять почему он появляется
    public function js (): void{ }

}