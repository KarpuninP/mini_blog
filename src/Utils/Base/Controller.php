<?php

namespace App\Utils\Base;

use App\Utils\App;

abstract class Controller
{

    // Folder name template
    public string $template = '';
    // Folder name layout
    public string $layout = '';
    // Data will be stored here
    public array $data = [];
    public array $onlyData = [];
    // There will be metadata
    public array $meta = ['title' => '', 'desc' => '', 'keywords' => ''];
    // Model object (bd)
    public object $nameModal;


    public function __construct()
    {
        // Add parameters to the date so that you can get them
        $data['params']=App::$app->getProperties();
        // put everything in properties
        $this->data = $data;

        // change the theme of the site (such as dark, etc.) then finish something with a separate class as an example
        //$this->layout = 'dark_blog';
    }

    /**
     * @throws \Exception
     */
    // For page rendering. Get parameters from the base controller and throw this class View
    public function getView(): void
    {
        // Create an object of the View class and pass the parameters of this class there
        $viewObject = new View($this->layout, $this->template, $this->meta);
        // If there is a request sent via ajax server, then we do this
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            // It is currently not in use
            $viewObject->getJsAjax($this->onlyData);
        } else {
            //  If not, then run the method to rent the page
            $viewObject->show($this->data);
        }
    }

    // Generate metadata
    public function setMeta($title = '', $desc = '', $keywords = ''): void
    {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }

    // Work with date
    public function view(string $template, array $data = []): void
    {
        // Pass folder name
        $this->template = $template;
        // Put everything in properties
        $this->data['siteData'] = $data;
    }

}