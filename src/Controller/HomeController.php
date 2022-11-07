<?php

namespace App\Controller;



class HomeController extends TypeController
{


    /**
     * @throws \Exception
     */
    // Главная страница (тема)
    public function index()
    {
//        var_dump(isset($_SESSION['isLogin']));
        // Проверка гет параметра
        $index = $this->getReqParam('theory');
        // Проверяем то что получилось
//       var_dump($index);

        // Засовываем название вкладки и описание
        $data = [
            'namePage' => 'Теоретический раздел',
            'descriptionPage' => 'Выводится теория, тех или иных технологий',
        ];

        // В массив $data мы добавляем в конец то что пришло от метода dbData
        // В методе dbData приходит массив с данными для отображения на сайте и массив с нумерацией страниц
        // Используем функция array_merge для слияния массива
        $data = array_merge($data, $this->dbData('theory', $index));

        // Проверяем все ли впоредке
//        debug($data);

      // обязаловка для возврата странице
      // мета данные
      $this-> setMeta (
          'Главная страница',
          'тут содержится данные про сдачу собеседование',
          'Собеседование на php, ответы на собеседование'
      );
      // возвращает к подключению шаблон и передача данных
      $this-> view('main.main', $data);
    }
}