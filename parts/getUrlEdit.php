<?php
// Проверяем что пришло по гет
//var_dump($_GET);

// Задаем переменные и проверяем пришло ли если нет то задаем пустую строку (тернарные операторы)
$number = isset($_GET['number']) ? $_GET['number'] : '';
$theme = isset($_GET['theme']) ? $_GET['theme'] : '';

// Проверка, что бы $number был больше нуля и числом и $theme была строга задана
if ($number > 0 & is_numeric($number) & $theme == 'theory' || $theme == 'practice') {
    // Получаем номер/ключ массива (см. функцию selectArray() и openDbComments())
    $numberArray = selectArray(openDbComments($theme),$number);
    // Получаем заданный массив (см. функцию openDbComments())
    $editArray = openDbComments($theme)[$numberArray];
    // Затем разбиваем его на категории и подставляем в формы HTML (см. файл edit.php)

    // Присваиваем правильное значение переменной $nameType что бы подставить в формы HTML (см. файл edit.php)
    if ($editArray['type'] == 'theory' ) {
        $nameType = 'Теория';
    }else{
        $nameType = 'Практика';
    }

// Если условия не прошло и в гет параметре прислали другое значение, то переходим на главную страницу и
}else{
    header('Location: http://localhost:8000');
    // Записываем в файл, дату и название ошибки. Прерываем исполнение кода
    $date = date("Y-m-d H:i:s");
    $message = $date . ' - ' . 'Ошибка, в гет запросе пришли сторонние данные.Файл getUrlEdit' . "\r";
    file_put_contents('database/error.txt', $message, FILE_APPEND);
    exit;
}

// Функция распаковки комментариев из json формата в массив
// Принимаем строку, с какой темой/файлом работаем
function openDbComments (string $theme)
{
    // Если $theme равняется тому что приняли значит:
    if ($theme == 'theory') {
        // Получаем доступ к файлу
        $dataTheory = file_get_contents('database/commentsTheory.json');
        // Преобразуем строку в массив php
        $dataTheory = json_decode($dataTheory, 1);
        // Проверяем если у нас там что, то есть, если нет то создаем (для избежания ошибки)
        if ($dataTheory == null) {
            $dataTheory = [];
        }
        // Возвращаем то что получили
        return $dataTheory;

     // Или если $theme другое значение то
    }elseif ($theme == 'practice') {
        // Получаем доступ к файлу
        $dataPractice = file_get_contents('database/commentsPractice.json');
        // преобразуем строку в массив php
        $dataPractice = json_decode($dataPractice, 1);
        // Проверяем если у нас там что, то есть, если нет то создаем (для избежания ошибки)
        if ($dataPractice == null) {
            $dataPractice = [];
        }
        // Возвращаем то что получили
        return $dataPractice;

    // Иначе
    } else {
        // Перенаправляем на главную страницу, и результат об ошибки записываем в файл с датой и сообщением
        header('Location: http://localhost:8000');
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Ошибка, неправильная тема запроса.Файл getUrlEdit' . "\r";
        file_put_contents('database/error.txt', $message, FILE_APPEND);
        exit;
    }
}

// Функция для поиска по массиву по id и возвращает номер/ключ массива
// Проходимся циклом по массиву
function selectArray (array $arrays, int $id) {
    foreach ($arrays as $key => $value) {
        $idArray = $value['id'];
        // Если значение массива совпадает с полученными данными, то возвращаем часть массива
        if ($idArray == $id) {
            return $key;
        }
    }
}
// Проверяем как работают функции
//var_dump(selectArray (openDbComments ('theory'),2));
//var_dump(openDbComments ('theory'));



