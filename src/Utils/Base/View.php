<?php

namespace App\Utils\Base;

class View
{
    // название папки вида
    public $template;
    // шаблон = неизменные части (нав бар, футер и боковой)
    public $layout;
    // данные которые надо передать во фронтенд
    public $data = [];
    // метеоданные
    public $meta = [];


    public function __construct(string $layout, string $template, array $meta)
    {
        // Название папки с видом
        $this->template = $template;
        // массив с методанными
        $this->meta = $meta;
        // Если передан шаблон, мы возьмем его. В противном случае если передана строка тогда мы возмем по умолчанию шаблон
        $this->layout = $layout ?: LAYOUT;
    }


    /**
     * Этот коментарий нужен для PhpStorm что бы он понял что это эксепшон
     * @throws \Exception
     */
    // Тут запуск формирование странички (рединг)
    public function show(array $data): void
    {
        // работа с данными которые пришли
        // превращаем из массива в набор переменных
        extract($data, EXTR_OVERWRITE);

        // Работа с видом
        // Если в template нечего не пришло(он равно пустой строке) и мы находимся в режиме разработке, то тогда в вид
        // ставим заслонку
        if(($this->template == '') && DEBUG == 1) {
            $template = 'giglet_main';
        // если что то пришло то тогда передаем это
        } elseif ($this->template) {
             $template = $this->template;
        // Иначе выкидываем ошибку, что вид не обнаружен (если разработка снята)
        } else {
            throw new \Exception("Вид отсутствует", 500);
        }

        // Разбиваем, вместо точки ставим /
        $templatePath = str_replace('.', '/', $template);
        // создаеи динамический путь к виду
        $viewFile = VIEW  . '/' . $templatePath . '.template.php';
        // Посмотреть кака сформировалась строка
//       var_dump( $viewFile);

        // Проверяем есть ли такой файл
        if(is_file($viewFile)){
            //Подключаем буферизацию https://www.php.net/manual/ru/function.ob-start.php
            // Так как нам надо это все кинуть в шаблон а не так выводить
            ob_start();
            // подключаем такой файл
            require_once $viewFile;
            // Мы это все поместить в переменную $content
             $content = ob_get_clean();
            // Проверяем на работу способность
//            echo $content;
        }else{
            // выкидываем ошибку что такого файла нету
            throw new \Exception("На найден вид {$viewFile}", 500);
        }

        // Работа с шаблоном
        // Проверяем если тут что, то есть, пустая строка это false. То выкидываем ошибку
        if($this->layout) {
            // формируем путь к шаблону
            // Так как у нас динамически созадется путь и название файла мы можем менять шаблом по усмотрению
            // Указав в контролере переназначив переменну layout по примеру  $this->layout = 'test';
            $layoutFile = VIEW . "/layouts/{$this->layout}.template.php";
            // проверяем что получилось
//            var_dump($layoutFile);

            // Проверка если фаил. Если есть то подключаем, Если нет то выкидываем ошибку
            if (is_file($layoutFile)) {
                require_once $layoutFile;
            } else {
                throw new \Exception("Не найден шаблон {$this->layout}", 500);
            }
        }else {
            throw new \Exception("Непришло название шаблона ", 500);
        }
    }

    // Добавим мето данные <title>,description,content)
    public function getMeta() : string
    {
        // PHP_EOL - возршает коректный отображение перевод строки https://www.php.net/manual/ru/reserved.constants.php
        // Заполним мето данные в наш шаблон и их вернем(поместим наш шаблон)
        // Краткое описание страницы. В некоторых случаях оно может показываться в качестве
        $output = '<meta name="description" content="' . $this->meta['desc'] . '">' . PHP_EOL;
        // Для оптимизации сео пример использование: "Собеседование на php, ответы на собеседование, и т.д."
        // https://timeweb.com/ru/community/articles/vse-o-meta-tege-keywords
        $output .= '<meta name="keywords" content="' . $this->meta['keywords'] . '">' . PHP_EOL;
        // титл странички
        $output .= '<title>' . $this->meta['title'] . '</title>' . PHP_EOL;
        return $output;
    }

}