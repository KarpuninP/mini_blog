<?php

namespace App\Utils;

class App
{
    // $app - временый контейнер (шаблом проэктирование риестор)
    public static object $app;

    public function __construct()
    {
        // Стартуем сессию
        session_start();

        // Создаем класс с нашими эксепшонами, что бы они подключились
        new ErrorHandler();

        // Подключаем наш реестр (в нем мы можем хранить все наши параметры)
        self::$app = Registry::instance();
        // Вызываем getParams что бы заполнить контейнер Registry::instance данными
        $this->getParams();

        // Подключаем наш роутер (маршрутизатор)
        $router = new Router();
        // Запускаем метод
        $router->process();
    }

    // Получение параметров из папки config.
    protected function getParams(): void
    {
        // В переменную помешаем то что содержится params.php. Где обращаемся константа CONF (путь к папке)
        $params = require_once CONF . '/params.php';
        // Если этот массив не пуст, то пройдемся по нем и возьмём отдельно ключ и значение

        if (!empty($params)) {
            foreach ($params as $k => $v) {
                // Тут мы обращаемся к классу Registry метод setProperty и помешаем туда ключ и значение
                self::$app->setProperty($k, $v);
            }
        }
    }
}