<?php

namespace App\Model;

use App\Utils\Base\Model;
use RedBeanPHP\OODBBean;
use RedBeanPHP\RedException\SQL;


class Blog extends Model
{
    // Загружаем таблицу
    public function load(string $table ,int $index = 1): array
    {
        // Создаем пустой массив
        $arrResult = [];
        // Создаем название свойств таблици
        $nameTable = $this->nameTable($table);
        // Проверяем что получилось
//        var_dump($nameTable);


        // загружаем все таги из бд
        $tag = $this->taglist();
        // Если есть таблица tag, значит выполняем этот код
        if ($tag) {
            // Теперь нам надо проверить соответствует номер $themes то что мы получили с таблицей тег.
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
        }
        // передаем обратно
        return $arrResult;
    }

    // Создаем имя таблици в many to many
    public function nameTable(string $table): string
    {
        return 'shared' . ucfirst($table) . 'List';
    }

//
    public function taglist(): ?array
    {
        return \R::find('tag');
    }

    /**
     * @throws \Exception
     */
    // Выдает номер тега заданной темы. Принимает в себя название темы странице
    public function tag(string $themes): array
    {
        $arrId = [];
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
     * @throws SQL
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


    // Находим пост что бы загрузить в редактор
    public function findPost(int $id, string $tag, string $themes): ?OODBBean
    {
        $users = \R::findOne('tag', "`themes` = ? ", [$tag]);
        // Формируем правильное название темы
        $sharedTableNameList = $this->nameTable($themes);
//        var_dump($users->$sharedTableNameList[$id]);
        return $users->$sharedTableNameList[$id];
    }

    /**
     * @throws SQL
     */
    // Редактировать пост
    public function edit(int $id, string $table, string $index, string $comment): int|string
    {
        // загружаю таблице
        $post = \R::load($table, $id);
        // Изменяем то что хотим
        $post->index = $index;
        $post->comment = $comment;
        // сохраняем
        return \R::store($post);
    }

    // Удалить пост
    public function remove(int $id, string $table, string $themes): int
    {
        // Узнаем что за тег id поста
        $tag = \R::findOne('tag', "`themes` = ? ", [$themes]);

        // Загружаем нашу таблицу тега этого поста
        $post = \R::load('tag', $tag['id']);
        // формируем правильное название темы
        $sharedTableNameList = $this->nameTable($table);
        // Удаляем соединение и сам пост который подключен
        return \R::trash($post->$sharedTableNameList[$id]);
    }

    /**
     * @throws SQL
     */
    // Создание пользователя
    public function createUser(string $email, string $pass): int
    {
        // Создаем или обрашаемся к таблице
        $createUser = \R::dispense('user');
        // заполняем данные
        $createUser->email = $email;
        $createUser->password = $pass;
        // сохраняем в бд и возвращаем id
        return \R::store($createUser);
    }

    // Проверка существует ли email
    public function emailCheck(string $email): ?OODBBean
    {
        // Выбрать по название таблице / where (что искать) / array (данные вместо ? должны быть в массиве)
        return \R::findOne('user', "`email` = ? ", [$email]);
    }
}