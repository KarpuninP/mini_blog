<?php

namespace App\Controller;
use App\Model\Test;
use App\Utils\App;
use App\Utils\Base\Controller;
use App\Model\Blog;
use App\Utils\Cache;


class TestController extends Controller
{

    // Так выклядит стандартная страница
    public function index()
    {

        // смена шаблона
        $this->layout='dark_blog';
        // обезаловка для возрата странице
        // мета данные
        $this-> setMeta (
            'Главная страница',
            'тут содержится данные про сдачу собеседование',
            'Собеседование на php, ответы на собеседование'
        );
        // возрашает к подключение шаюлон и передача данных
        $this-> view('giglet_main', []);

        // что бы воспользоватся данными которые передал, в вид ставляем это. Все данные находятся в масиве по обрашению $siteData['']
        //<?=$siteData['a'];
    }

    // смотрим что пришло в url
    public function server(): void
    {
        // получить полость всю сылку
        var_dump($_SERVER['REQUEST_URI']);
        // получить Гет параметр
        var_dump($_GET);
        // получить Пост параметр
        var_dump($_POST);
        echo 'Наш адрес: ' . PATH;
    }

    //подключение страници
    public function db(): void
    {

        // запуск модельки
        $model = new Test();

        // Обрашение к разным методам с помошю гет параметра
        // запуск метода по ключу масива /test/db?q
        if ($_GET) {
            $get = key($_GET);
            // проверка если есть этот метод в контролере, то идем дальше
            if (!method_exists($model, $get)) {
                throw new \Exception('Нет метода: "' . $get  . '" в классе: ' . explode(':', serialize($model))[2] , 404);
            }
            $model->$get();
        }
    }

    public function cache(): void
    {
        // то что есть у нас в контенере для примера засовываем в переменную, что бы потом поместить в кеш
       $container = App::$app->getProperties();

       // обрашаемся к статическому методу кеша
       $cache = Cache::instance();
       // создаем кеш, название по которому можно к нему обращаться и что туда ложем
      $cache->set('test', $container, 2);
       // Делаем логику, если тут что то есть тогда когда исполняется, если false тогда нет
        if ($cache->get('test')) {
            // Получаем наш кеш который мы поместили. Ищем по ключу
            var_dump($cache->get('test'));
        }else {
            var_dump(App::$app->getProperties());
        }
          // можно логику построить еше так
//        $cacheP =  $cache->get('test');
//        if(!$cacheP) {
//            // Берем из закидываем из источника (первоначальные данные)
//            $cacheP  = App::$app->getProperties();
//            // то что получили записываем в кеш
//            $cache->set('test', $cacheP, 2);
//        }
//        return $cacheP;
    }

    // Пример работы с дебагом
    public function useDebag(): void
    {
        debug(App::$app->getProperties());
        //var_dump( App::$app->getProperties());
    }

    // это функция редиректа из файла helpers
    public function useredirect(): void
    {
        // Если что то сюда помешаем, то он на него редиректит
        // Если нечего не перемешаем то просто обновится страница (редерекнит сам на себя)
        redirect('test');
    }

    // Пример работы с контенером
    public function contener(): void
    {
        // положить что то в контенер
        App::$app->setProperty('currencies', 'в контенер помешено слово currencies ');
        // просмотр то что положили
        echo ' ' . App::$app->getProperty('currencies');
        // просмотреть весь контенер
        debug(App::$app->getProperties());
    }

    /**
     * Этот коментарий нужен для PhpStorm что бы он понял что это эксепшон
     * @throws \Exception
     */
    // Пример работы с эксепшоном
    public function exception(): void
    {
        // так выглядит пример с эксепшоном
         throw new \Exception("тестовый эксепшон пример", 404);
    }

}

