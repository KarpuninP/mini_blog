<?php

namespace App\Utils;

class App
{
    // $app - временый контейнер (шаблом проэктирование риестор)
    public static $app;

    public function __construct()
    {

        // Стартуем сесию
        session_start();

        // Создаем класс с нашими эксепшонами, что бы они подключились
        new ErrorHandler();

        // Подключаем наш реестр (в нем мы можем хранить все наши параметры)
        self::$app = Registry::instance();
        // Вызываем getParams что бы заолнить контейнер Registry::instance данными
        $this->getParams();

        // Подключаем наш роутер (маршрутизатор)
        $router = new Router();
        // Запускаем метод
        $router->process();
    }

    // Получение параметров из папки config.
    protected function getParams(): void
    {
        // В переменную помешаем то что содержится params.php. Где обрашаемся константа CONF (путь к папке)
        $params = require_once CONF . '/params.php';
        // Если этот масив не пуст, то пройдемся по нем и возмем отдельно ключ и занчение

        if(!empty($params))
        {
            foreach($params as $k => $v)
            {
                // Тут мы обрашаемся к класу Registry метод setProperty и влаживаем туда ключ и занчение
                self::$app->setProperty($k,$v);
            }
        }
    }
}