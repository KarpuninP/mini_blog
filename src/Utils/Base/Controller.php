<?php

namespace App\Utils\Base;

use App\Utils\App;

abstract class Controller
{

    // название папки шаблон
    public $template = '';
    // название самого шаблона
    public $layout = '';
    // Тут будет хранится данные
    public $data = [];
    // Тут будут мета даный хранится тайтл, дескрипшон
    public $meta = ['title' => '', 'desc' => '', 'keywords' => ''];
    // Объект модели (бд)
    public $nameModal;


    public function __construct()
    {
        // добовляем в дату параметры, что бы можно их было получить
        $data['params']=App::$app->getProperties();
        // засовывваем все в свойства
        $this->data = $data;

        // меняем тему сайта (типа темная и т.д.) потом что то доделать отдельный клас это в качестве примера
        //$this->layout = 'dark_blog';
    }

    // Для отрендование странички. Получаем параметры от базового контролера и перекидываем это class View
    public function getView(): void
    {
        //создаем обьект класса View и передаем туда параметры этого класса
        $viewObject = new View($this->layout, $this->template, $this->meta);
        // Далее запускаем метод, для того что бы отрендовать страничку
        $viewObject->show($this->data);
    }

    // формировать мето данные
    public function setMeta($title = '', $desc = '', $keywords = ''): void
    {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }

    // работа с датой
    public function view(string $template, array $data = []): void
    {
        // передаем название папки
        $this->template = $template;
        // засовываем все в свойства
        $this->data['siteData'] = $data;
    }

    // этот метод нужен для кастыля что бы незабивать лог.... баг  который немогу понять почему он появляется
    public function js (): void{ }
}