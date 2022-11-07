<?php

namespace App\Controller;

use App\Model\Blog;
use App\Utils\Base\Controller;

class TypeController extends Controller
{
    public function  __construct()
    {
        // если нужно в конструкторе, что-то добавить пишем это
        parent::__construct();
        // Подключаем название модельки
        $this->nameModal = new Blog();
    }

    /**
     * @throws \Exception
     */
    // Берем данные из бд с мадоннами таблицами и запускаем нашу модельку
    public function dbData(string $themes, int $index = 1): array
    {
        // Объект модельки перекидываем в переменную
        $theoryData = $this->nameModal;
        // Засовываем в массив с параметрами страниц
        $data['page'] = $theoryData->tag($themes);
        // Засовываем в массив, то что нам надо выдать данные из бд
        $data['textDb'] = $theoryData->load($themes, $index);
        $data['nameTable'] = $themes;
        // Проверяем то что получилось
//        var_dump($data);
        // Возвращаем массив данных
        return $data;
    }

    /**
     * @throws \Exception
     */
    // Проверка Гет параметра
    public function getReqParam(string $themes): int
    {
        // То что получили в Гет параметрах
        // Если у нас не пуста, подставляем то что пришло гет параметром, иначе
        // Прейдет первая цифра в массиве заданной таблице
       return !empty($_GET['p']) ? $_GET['p'] : current($this->nameModal->tag($themes));
    }
}