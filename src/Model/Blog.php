<?php

namespace App\Model;

use App\Utils\Base\Model;


class Blog extends Model
{
    // Загружаем таблицу
    public function load(string $table ,int $index = 1): array
    {
        // Создаем пустой массив
        $arrResult = [];
        // Создаем название свойств таблици
        $nameTable = 'shared' . ucfirst($table) . 'List';
        // Проверяем что получилось
//        var_dump($nameTable);

        // загружаем все таги из бд
        $tag  = \R::find('tag');
        // Теперь нам надо проверить соответсвует номер $themes то что мы получили с таблицей тег.
        // Создаем новый массив
        $idArr = [];
        // Проходим циклам по массиву
        foreach ($tag as $idBean) {
            // Переводим из Массива бинов в обычный массив
            // Создаем новый массив и помешаем туда
            // id нашего тега
            $idArr[] = $idBean->export()['id'];
        }
        // Проверяем что вышло
//        var_dump($idArr);

        // Проверка есть ли в нашем массиве такой id, если нет то его переназначаем на 1
        if (!in_array($index, $idArr)){
            $index = 1;
        }
        // Проверка Есть ли в этой таблице свойства. Топ то этот тег идет к другой таблице many to many
        // Если нет то $index переназначаем на 1
        // Должны получить true или false
//        var_dump((bool)!$tag[$themes]->$nameTable);
        if (!$tag[$index]->$nameTable) {
            $index = 1;
        }

        // После всех проверок формируем обычный массив то что выбрали
        foreach ($tag[$index]->$nameTable as $v) {
            $arrResult[] = $v->export();
         }

        // Засовываем в массив тему тега
        $arrResult['tag'] = $tag[$index]->export()['themes'];

        // Проверяем что получилось
//        var_dump($arrResult);

        // передаем обратно
        return $arrResult;
    }

    /**
     * @throws \Exception
     */
    // Выдает номер тега заданной темы. Принимает в себя название темы странице
    public function tag(string $themes): array
    {
        // Проверяем что за тема пришла, в $tagTheme ложем название таблице которое надо загрузить
        if ($themes == 'theory') {
            $tagTheme = 'tag_theory';
        }elseif ($themes == 'practice') {
            $tagTheme = 'practice_tag';
        }else {
            // Если пришол другой вариант, выкидываем ошибку
            throw new \Exception("Не найдена соответствующая тема странице, пришло: $themes", 500);
        }

        // Загружаем выбраную таблицу с колонкой tag_id, получаем массив
        $arrTagId = \R::getAll("SELECT tag_id FROM $tagTheme");
        // удаляем повторяющиеся элементы и обнуляем ключи массива
        $arrTagId = array_values(array_unique($arrTagId, SORT_REGULAR));
        // Формируем простой массив, для легшего перебора
        foreach ($arrTagId as $v) {
            foreach ($v as $v1) {
                $arrId[] = $v1;
            }
        }

        // Проверяем что получилось
//        var_dump($arrId);
        // Возвращаем результат
        return $arrId;
    }


    /**
     * @throws \RedBeanPHP\RedException\SQL
     */
    // Создает таблицу (текст)
    public function create(string $table , string $themes, string $index, string $comment): int|string
    {
        // Используем метод many to many
        // https://redbeanphp.com/index.php?p=/many_to_many
        // Создаем таблицу
        $data = \R::dispense($table);
        // Добовляем в эту таблицу данные
        $data['index'] = $index;
        $data['comment'] = $comment;

        // Если есть заданная строка, то выдаем ее, если нету то создаем и возвращаем
        // Обрашаемся к таблице $data и подключаем ее к таблице тег. Создаются связь many to many
        $tag = \R::findOrCreate('tag', ['themes' => $themes]);
        $data->sharedTagList[] = $tag;
        // сохраняем в бд и возрашаем id
        return \R::store($data);
    }



    public function update()
    {

    }

    public function remove()
    {

    }


}