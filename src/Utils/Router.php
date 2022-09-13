<?php

namespace App\Utils;

class Router
{
    // тут старт
    public function process()
    {
            // Получаем массив с полным путем контролера и название метода, которые хотим дернуть (получили это все в url)
            $action = $this->getAction();
            // Определяем это у нас полный путь контролера
            $controller = $action[0];
            // Определяем это у нас название метода
            $method = $action[1];
            //Смотрем какой у нас метод и путь контролера
//          var_dump($method . ' - ' . $controller);
            // Создаем контролер
            $object = new $controller;
            // Запускаем метод
            $object->$method();

            // запускаем базовый шаблон
            $object->getView();
    }



    /**
     * Комментарий для phpstorm что бы понимал эксепшоны
     * @throws \Exception
     */
    // Разбивает url сылку и возрашает массивом название контролера и метода.
    private function getAction(): array
    {
        // Получаем PATH от ссылки
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        // Разбиваем ссылку на массив по элементам. 0 ключ - это пустота, 1 - контролер, 2 - экшон(метод)
        $url = explode('/', $url);
        // Формируем полный неймспейс класса
        // Если 1 ключ массива будет пустой, то запускаем HomeController
        if (empty($url[1])) {
            $controller = '\App\Controller\HomeController';
            // Если там что, то есть, то формируем полный путь этого контролера и пишем с заглавной буквы, и присоединяем слово Controller
        } else {
            $controller = '\App\Controller\\' . ucfirst($url[1]) . 'Controller';
            // Если такого класса не существует, то выдаем эксепшон (проверка на наличие класса)
            if (!class_exists($controller)) {
                throw new \Exception('Нет такого класса: ' . '"' . $controller . '"', 404);
            }
        }

        // Если 2 ключ массива пуст, то метод будет index
        if (empty($url[2])) {
            $method = 'index';
            // Иначе название второго масива
        } else {
            $method = $url[2];
            //var_dump($method);
        }
       // var_dump($method);
        // (проверка на наличие класса и в нем контролера) Если нет такого метода в классе, то выкидываем эксепшон
        if (!method_exists($controller, $method)) {
            throw new \Exception('Нет метода: "' . $method  . '" в классе: ' . '"' . $controller . '"', 404);
        }

        // Возрашаем полный путь контролера и название метода в массиве.
        return [$controller, $method];
    }
}