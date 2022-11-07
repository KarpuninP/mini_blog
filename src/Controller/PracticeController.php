<?php

namespace App\Controller;

class PracticeController extends TypeController
{
    /**
     * @throws \Exception
     */
    // Главная страница (тема)
    public function index()
    {
        // Проверка гет параметра
        $index = $this->getReqParam('practice');
        // Проверяем то что получилось
//        var_dump($index);

        // Засовываем название вкладки и описание
        $data = [
            'namePage' => 'Практический раздел',
            'descriptionPage' => 'Выводится практическая запись, тех или иных технологий',
        ];

        // В массив $data мы добавляем в конец то что пришло от метода dbData
        // В методе dbData приходит массив с данными для отображения для сайта и массив с нумерацией страниц
        $data = array_merge($data, $this->dbData('practice', $index));

        // Проверяем все ли в порядке
//       debug($data);

        // обязаловка для возврата странице
        // мета данные
        $this-> setMeta (
            'Главная страница',
            'тут содержится данные про сдачу собеседование',
            'Собеседование на php, практическая часть'
        );
        // возвращает к подключению шаблон и передача данных
        $this-> view('main.main', $data);
    }
}