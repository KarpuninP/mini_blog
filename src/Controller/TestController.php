<?php

namespace App\Controller;
use App\Model\Test;
use App\Utils\App;
use App\Utils\Base\Controller;
use App\Utils\Cache;


class TestController extends Controller
{
    public function index()
    {
//       var_dump($_SERVER);
//        var_dump($_POST);
        //debug($_SERVER);
        $this->onlyData = $_POST;
        // template change
//        $this->layout='dark_blog';

        $this->setMeta(
            'Test page',
            'test test test',
            'interview interview interview'
        );
        $this-> view('giglet_main', []);
    }

    // look at what came in the url
    public function server(): void
    {
//        var_dump($_SERVER['REQUEST_URI']);
        debug($_SERVER['REQUEST_URI']);
//        var_dump($_GET);
//        var_dump($_POST);
        echo 'Our address: ' . PATH;
    }

    // Test database connection
    public function db(): void
    {
        $model = new Test();

        // Calling different methods with a get parameter
        // launching a method on an array key /test/db?q
        if ($_GET) {
            $get = key($_GET);
            // check if there is this method in the controller, then go ahead
            if (!method_exists($model, $get)) {
                throw new \Exception('No method: "' . $get  . '" in class: ' . explode(':', serialize($model))[2] , 404);
            }
            $model->$get();
        }
    }

    // Cache check
    public function cache(): void
    {
        // for example, what we have in the container is put into a variable, which would then be placed in the cache
       $container = App::$app->getProperties();

       // accessing the static cache method
       $cache = Cache::instance();
       // create a cache, the name by which you can access it and what we put there
      $cache->set('test', $container, 2);
       // We make logic, if there is something then when it is executed, if false then not
        if ($cache->get('test')) {
            // We get our cache that we placed. Looking for a key
            var_dump($cache->get('test'));
        }else {
            var_dump(App::$app->getProperties());
        }
    }

    // Debug example
    public function useDebag(): void
    {
        debug(App::$app->getProperties());
        //var_dump( App::$app->getProperties());
    }

    // this is the redirect function from the helpers file
    public function useredirect(): void
    {
        redirect('test');
    }

    // Container example
    public function contener(): void
    {
        App::$app->setProperty('currencies', 'the word is placed in the container currencies ');
        echo ' ' . App::$app->getProperty('currencies');
        debug(App::$app->getProperties());
    }

    /**
     * @throws \Exception
     */
    public function exception(): void
    {
         throw new \Exception("test test test", 404);
    }

}

