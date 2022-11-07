<?php

namespace App\Utils\Base;

use App\Utils\App;

abstract class Controller
{

    // название папки шаблон
    public string $template = '';
    // название самого шаблона
    public string $layout = '';
    // Тут будет храниться данные
    public array $data = [];
    public array $onlyData = [];
    // Тут будут мета данный хранится тайтл, дескрипшон
    public array $meta = ['title' => '', 'desc' => '', 'keywords' => ''];
    // Объект модели (бд)
    public object $nameModal;


    public function __construct()
    {
        // добавляем в дату параметры, что бы можно их было получить
        $data['params']=App::$app->getProperties();
        // засовываем все в свойства
        $this->data = $data;

        // меняем тему сайта (типа темная и т.д.) потом что-то доделать отдельный клас это в качестве примера
        //$this->layout = 'dark_blog';
    }

    /**
     * @throws \Exception
     */
    // Для отрендование странички. Получаем параметры от базового контролера и перекидываем это class View
    public function getView(): void
    {
        //создаем обьект класса View и передаем туда параметры этого класса
        $viewObject = new View($this->layout, $this->template, $this->meta);
        // Если будет отправка запроса через ajax сервер, то делаем это
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            // еше доработать
            $viewObject->getJsAjax($this->onlyData);
        } else {
            // В противном случае просто запускаем это
            // Далее запускаем метод, для того что бы отрендовать страничку
            $viewObject->show($this->data);
        }
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

}