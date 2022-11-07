<?php

namespace App\Model;

use App\Utils\Base\Model;

class Test extends Model
{
    // Засунуть в конструктор таблицу которая должна тут быть

    public function test(): array
    {
        // делает запрос взять все с таблици
        $test = \R::getAll('SELECT * FROM test');
        // вывод какой запрос был сделан в консоль
        $consol = \R::getDatabaseAdapter()
            ->getDatabase()
            ->getLogger();
        $consol->grep('SELECT');

        // возражает масив с результатом
        return ['result' => $test, 'request' => $consol];

    }


// банды (удалить) пример функ-ции exec (подготовка запроса) писать можно любой запрос
    public function execDel(): string
    {
        return \R::exec('DELETE FROM `test` WHERE  `id` = ? OR `id` = ?', array(
            1,
            2
        ));
    }

    // exec - эта функция подготовки запроса, genSlots - это знаки вопросы
    public function execUpd()
    {
        // масив из данных которые надо вставить
        $id = [1, 2, 4, 5];
        // подготовка запроса
        $users = \R::exec("UPDATE `testuser` SET `many` = 28  WHERE  `id` IN (" . \R::genSlots($id) . ")", $id);
        // выведит 4 это число что обновлял
        var_dump($users);
        // покажет 4 знака вопроса
        var_dump(\R::genSlots($id));
    }

    // Добавить пользователя в таблицу и вернуть его id
    public function execInsert()
    {
        // подготовка запроса
        $users = \R::exec('INSERT INTO `testuser` (`name`, `age`, `email`) VALUES (?,?,?)', ['Artur', 15, 'jdj@gmail.com']);
        // Возрашает Id который был добавлен (последний)
        echo 'Last insert id: ' . \R::getInsertID();
    }

// создание таблици
    public function add()
    {
        // Создаем или обрашаемся к таблице
        $testUser = \R::dispense('testuser');
        // заполняем данные
        $testUser->name = 'Ted';
        $testUser->age = 18;
        $testUser->contry = 'UA';
        // так же можно заполнять через масив
        $testUser['many'] = 150.5454;
        // сохраняем в бд и возрашаем id
        return \R::store($testUser);
    }


// Закгрузить одну  из бд по id
    public function load()
    {
        // Выбрать по id
        $user = \R::load('testuser', 3);
        // просмотреть бин (масив)
        var_dump($user);
        // обартится/ вывести этого пользователя
        echo 'Имя: ' . $user['name'];
    }

    //
    public function loads()
    {
        // Выбрать по id
        $users = \R::loadAll('testuser', [3, 2, 1]);
        // просмотреть бин (масив)
        var_dump($users);
        // обартится/ вывести этих пользователей через цикл
        foreach ($users as $user) {
            echo 'Имя: ' . $user['name'] . '<br>';

        }

    }

    // поиск
    public function find()
    {
        // Выбрать по название таблице / where & sort (что искать/ параметры поиска) / array (даные вместо ? должны быть в масиве)
        $users = \R::find('testuser', "`age` > ? ORDER BY `age` DESC", [19]);
        // просмотреть бин (масcив)
        var_dump($users);

    }

    // поиск и выдача одного запросо просто добовляет в запрос LIMIT 1
    public function findOne()
    {
        // Выбрать по название таблице / where (что искать) / array (даные вместо ? должны быть в масиве)
        $users = \R::findOne('testuser', "`many` = ? ", [28]);
        // просмотреть бин (масcив)
        var_dump($users);
    }

    // поиск и выдаст все что в таблице,  непринимает строку where , может только сортировать
    public function findAll()
    {
        // Выбрать по название таблице / sort (параметры поиска) )
        $users = \R::findAll('testuser', "ORDER BY `age` DESC");
        // просмотреть бин (масcив)
        var_dump($users);
    }

    // PDO Database Cursor, если вкраце получить из БВ большое количество данных, не расходуя при этом память приложения.
    // https://habr.com/ru/company/lamoda/blog/455571/
    // https://redbeanphp.com/index.php?p=/finding
    public function findCol()
    {
        // Выбрать по название таблице / sort ( параметры поиска) )
        $users = \R::findCollection('testuser', "ORDER BY `age` DESC");
        // просмотреть бин (маcсив)
        // debug($users);
        // Выбрать от тудова то что нам надо
        while ($user = $users->next()) {
            echo 'Имя: ' . $user['name'] . '<br>';
        }
    }

    //  Это не синтексис like это синтексис IN
    // SELECT `testuser`.*  FROM `testuser`  WHERE ( `name` IN ( :slot0,:slot1 ) ) ORDER BY `age` ASC
    // https://redbeanphp.com/index.php?p=/finding
    public function findLike()
    {
        //  поиск  в таблице testuser искать по колонке name сортировка по возрастанию
        $users = \R::findLike('testuser', ['name' => ['Ted', 'Tom']], "ORDER BY `age` ASC");
        // просмотреть бин (маcсив)
        debug($users);
    }

    // Если не найдет то, создаст
    // https://redbeanphp.com/index.php?p=/finding
    public function findCreate()
    {
        //  поиск в таблице testuser с заданами пораметрами
        $users = \R::findOrCreate('testuser', [
            'name' => 'Ron',
            'age' => 50
        ]);
        // просмотреть бин (маcсив)
        debug($users);
    }

    // Обычный подсчет
    //  SELECT COUNT(*) FROM `testuser`
    // https://redbeanphp.com/index.php?p=/counting
    public function count()
    {
        echo 'Всего пользователей в БД: ' . \R::count('testuser');
    }

    //Обновить легко, сначало надо загрузить, потом подправить (как массив) и далее сохранить
    public function update()
    {
        // Выбрать по id
        $user = \R::load('testuser', 6);
        // Изменяем то что хотим
        $user->contry = 'France';
        // сохраняем
        \R::store($user);
        // просмотреть бин (масив)
        var_dump($user);
    }

    // взять все и проработать через цикл и сохранить тоже все / выйграш в производительности
    public function updateFindAll()
    {
        // Выбрать по id
        $users = \R::findAll('testuser');
        // проходимся циклом по массиву и меняем данные + 2 года к каждому
        foreach ($users as $user) {
            $user->age = $user->age + 2;
        }
        // сохраняем все
        \R::storeAll($users);
        // просмотреть бин (масив)
        var_dump($users);
    }

    // Если нам нужен Массив и работа с массивом/ так можно выйграть по производительности
    public function updateArr()
    {
        // Выбрать по id
        $user = \R::load('testuser', 5);
        // перекодируем из бин в обычный массив/ смотрим что с ним и работаем с ним...
        $user = $user->export();
        var_dump($user);
        // формируем запрос в бд и обновляем то что нам надо
        \R::exec('UPDATE testuser SET ' . (array_keys($user)[2]) . ' = ?  WHERE id = ?', [20, 5]);
    }

    // Пример обычного удаление
    public function dell()
    {
        $users = [];
        // Выбрать по id
        $user = \R::load('testuser', 2);
        // Если один бин (строку)
        \R::trash($user);

        // Если массив бинов
        \R::trashAll($users);
    }


    // Запрос getAll
    public function getAll()
    {
        // Запросить всех пользователей, выбрать, где их страна будет USA, отсортировать их по возрасту
        $result = \R::getAll('SELECT * FROM `testuser` WHERE `contry` = ? ORDER BY `age`', ['USA']);
        // возрашается масив
        var_dump($result);
    }

    // Запрос getRow / возрашает первую запись / всегда надо дописывать в конце LIMIT 1
    // так как он использует функцию getAll , но выводит тока первую запись
    // SELECT * FROM `testuser` ORDER BY `age`
    // По этой причине надо всегда указывать LIMIT 1 в конце, если его не написать он всегда будет выдовать все
    public function getRow()
    {
        // Запросить всех пользователей, отсортировать их по возрасту и выдать один результат
        $result = \R::getRow('SELECT * FROM `testuser` ORDER BY `age` LIMIT 1');
        // возрашается масив
        var_dump($result);
    }

    // возрашает масив из первых ячеек (в нашем случае id и name )
    public function getCol()
    {
        // Запросить всех пользователей, отсортировать их по возрасту
        $result = \R::getCol('SELECT * FROM `testuser` ORDER BY `age` ');
        // возрашается масив
        var_dump($result);

        // Запросить всех пользователей по имени, отсортировать их по возрасту
        $result = \R::getCol('SELECT `name` FROM `testuser` ORDER BY `age` ');
        // возрашается масив
        var_dump($result);
    }


    // Переконвентировать обычный массив в Bean
    public function convertToBean()
    {
        // Запросить всех пользователей, выбрать, где их страна будет USA, отсортировать их по возрасту
        $result = \R::getAll('SELECT * FROM `testuser` WHERE `contry` = ? ORDER BY `age`', ['USA']);
        // Конвентировать часть масива в бин
        $bean = \R::convertToBean('testuser', $result[0]);
        // Конвентировать масив в бин
        $beans = \R::convertToBeans('testuser', $result);
        // возрашается масив бинов
        var_dump($bean);
        var_dump($beans);
    }


    // One to many
    // От игрока до предмета
    // При обрашение к этому методу еше раз просто добавится новая запись к сушествуюших таблицах
    public function oneToManySet()
    {
        // Создаем таблицу 'player'
        $player = \R::dispense('player');
        // В нем будет 1 пользователь
        $player->nickname = 'Коте_98';

        // Создаем таблицу 'item' и добавит туда оружие
        $item1 = \R::dispense('item');
        // Что за тип предмета
        $item1->type = 'pistol';
        // модель оружие
        $item1->model = 'Five Seven';
        // количества оружия
        $item1->quantity = 1;

        // Обратимся к таблицу 'item' и добавит туда зелья
        $item2 = \R::dispense('item');
        // Что за тип предмета
        $item2->type = 'potion';
        // что за зелье
        $item2->model = 'Healing Orb';
        // количества зелья
        $item2->quantity = 7;

        // что бы между ними была связь, мы должны добавить в таблицу 'player' еше одно столбик он должен быть как масив
        // и добовляем в него нашу таблицу  $item
        // Требование к ownItemList[] : Всегда он должен быть как масивом и в CamelCase начинатся с
        // Own - owned
        // Название таблици
        // List
        $player->ownItemList[] = $item1;
        $player->ownItemList[] = $item2;
        // сохраняем только первую таблицу
        \R::store($player);
    }

    // Просмотр таблици / обрашение One to many
    public function oneToManyLoad()
    {
        // Создаем таблицу 'player'
        $player = \R::load('player', 1);
        // Получаем бин (массив) из таблице item
        // Запрос в БД будет таким
        //SELECT `player`.*  FROM `player`  WHERE ( `id` IN ( 1 ) )
        //SELECT `item`.*  FROM `item`  WHERE player_id = 1
        var_dump($player->ownItemList);

        // Так же само мы можем отдельно все взять
        echo 'Персонаж: ' . $player->nickname . '<br>';
        echo '<strong>Предметы персонажа</strong><br>';

        // Пройтись по массиву
        foreach ($player->ownItemList as $item) {
            echo $item->model . ' (x' . $item->quantity . ')<br>';
        }

    }

    // Добовляем предмет
    public function oneToManyAdd()
    {
        // Загружаем нашу таблицу
        $player = \R::load('player', 1);
        // Создаем таблицу 'item' и добавит туда оружие
        $item = \R::dispense('item');
        // Что за тип предмета
        $item->type = 'sword';
        // модель оружие
        $item->model = 'Двуручный меч';
        // количества оружия
        $item->quantity = 1;

        // соединяем таблици
        $player->ownItemList[] = $item;
        // сохраняем только первую таблицу
        \R::store($player);
    }

    // Удаление
    public function oneToManyDel()
    {
        // Загружаем нашу таблицу
        $player = \R::load('player', 1);
        // обрашаемся и удоляем ее по id
        \R::trash($player->ownItemList[5]);
    }


    // Разорвать связь с таблицей, не удоляя
    public function oneToManyUnset()
    {
        // Загружаем нашу таблицу
        $player = \R::load('player', 1);
        // разрыв связи между таблицами (указываем ключ массива)
        unset($player->ownItemList[5]);
        // Надо после этого сохранить
        \R::store($player);
    }


    // Разорвать связь с таблицей и удоляя строку
    public function oneToManyXUnset()
    {
        // Загружаем нашу таблицу
        $player = \R::load('player', 1);
        // Удоляем эту строку (указываем ключ массива)
        unset($player->xownItemList[5]);
        // Надо после этого сохранить
        \R::store($player);
    }

    // manyToOne

    public function manyToOneSet()
    {
        // Создаем таблицу 'item' и добавит туда оружие
        $item = \R::dispense('item');
        // Что за тип предмета
        $item->type = 'food';
        // Название обьекта
        $item->model = 'Apple';
        // количества
        $item->quantity = 3;

        // Обрашаемся к таблице item в свойствах player и загружаем и засовываем туда таблицу player
        $item->player = \R::load('player', 1);
        // Сохраняем
        \R::store($item);
    }

    // от придмета к игроку
    // Просмотреть / загрузить то что получилось
    public function manyToOneLoad()
    {
        // Загруить (по ключу массива)
        $item = \R::load('item', 7);
        // Обратится ко второй таблице, просмотреть к чему она привязана ( в нашем случаи загрузится пользователь)
        // Получаем бин игрока
        var_dump($item->player);
    }


    // Дублекат одного и того же предмета
    // Использует одновременно manyToOne и oneToMany
    public function manyToOneDup()
    {
       // Загруить (по ключу массива)
       $item = \R::load('item', 7);

       // Делаем из бобов в обычный массив (конвертация в обычный массив)
       $dup = $item->export();
        // Обнуляем id, делаем из но false, что бы он не сдублировался.
       $dup['id'] = false;

        // Обрашаемся в свойства нашего предмета, затем к его свойству ownItemList и добовляем в него наш $dup скопированый
        // При этом все конвентируем его в бины, так как связи работают тока в бинах
       $item->player->ownItemList[] = \R::convertToBean('item', $dup);
       // Сохраняем это все
       \R::store($item->player);
       // Получается чистая копия этого массива (строки в таблице) но с другим id
    }


    // принцип manyToMany
    // manyToMany в использование все тоже самое что и с manyToOne кроме слова shared
    // https://redbeanphp.com/index.php?p=/many_to_many
    public function manyToManySet()
    {
        // Создаем теблицу article и помешаем туда 2 записи (article1 и article2), с 2 колонками (title и content)
        list($article1, $article2) = \R::dispense('article', 2);
        // Запись 1
        $article1->title = 'Изучить RedBeanPhp';
        $article1->content = '.....';
        // Запись 2
        $article2->title = 'Отношение N11N в RedBeanPhp';
        $article2->content = '.....';

        // Создаем таблицу tag и помешаем 1 запись
        $tag = \R::dispense('tag');
        $tag->name = 'RedBeanPhp';

        // соединяем их что article1 и article2 будут ссылаться на таблицу tag
        // свойство sharedTagList[] (manyToMany)это то же самое что и ownItemList[] (oneToMany) ---правело к записи идентичны
        // Но с одним изменение что в начале надо указывать shared вместо own это и различает тип отношений в создании
        $article1->sharedTagList[] = $tag;
        $article2->sharedTagList[] = $tag;

        // сохраняем все это
        \R::storeAll([$article1, $article2]);

        /*
         * На выводе мы получим 3 таблиц. Первые 2 это то что мы задали article и tag
         * А третье это article_tag она и соединяет эти 2 таблице в единое. Там 2 колонки tag_id и article_id
         * Что к чему присоединяется.
         */
    }

    // Пример как пользоватся таблицей manyToMany
    public function manyToManyLoad()
    {
        // Загружаем таблицу 'article'
        $article = \R::load('article', 1);
        //  Обрашаемся к таблице article
        echo $article->title . '<br>';
        //  Обрашаемся к таблице tag
        echo $article->sharedTagList[1]->name;

        // Загружаем таблицу 'tag'
        $tag = \R::load('tag', 1);
        //  Обрашаемся к таблице tag
        echo $tag->name . '<br>';
        //  Обрашаемся к таблице article
        echo $tag->sharedArticleList[2]->title;
    }

    // Добовляем таблицу для тестов
    public function testStructureSet()
    {
        // Создаем таблицу 'player'
        $player = \R::dispense('player');
        // В нем будет 1 пользователь
        $player->nickname = 'Dranglake';

        // Создаем таблицу 'item' и добавит туда оружие
        $item1 = \R::dispense('item');
        // Что за тип предмета
        $item1->type = 'sword';
        // модель оружие
        $item1->model = 'Меч преследователя';
        // количества
        $item1->quantity = 1;
        // вес
        $item1->weight = 8;
        // цена
        $item1->price = 952;

        // Создаем таблицу 'item' и добавит туда оружие
        $item2 = \R::dispense('item');
        // Что за тип предмета
        $item2->type = 'shield';
        // модель оружие
        $item2->model = 'Щит дранглейка';
        // количества
        $item2->quantity = 2;
        // вес
        $item2->weight = 4;
        // цена
        $item2->price = 2951;


        // Создаем таблицу 'item' и добавит туда оружие
        $item3 = \R::dispense('item');
        // Что за тип предмета
        $item3->type = 'boots';
        // модель оружие
        $item3->model = 'Легенсы';
        // количества
        $item3->quantity = 1;
        // вес
        $item3->weight = 6;
        // цена
        $item3->price = 3000;

        // Создаем таблицу 'item' и добавит туда оружие
        $item4 = \R::dispense('item');
        // Что за тип предмета
        $item4->type = 'hood';
        // модель оружие
        $item4->model = 'Капишон теней';
        // количества
        $item4->quantity = 1;
        // вес
        $item4->weight = 1;
        // цена
        $item4->price = 9000;

        // Создаем таблицу 'item' и добавит туда оружие
        $item5 = \R::dispense('item');
        // Что за тип предмета
        $item5->type = 'shield';
        // модель оружие
        $item5->model = 'Щит орка';
        // количества
        $item5->quantity = 1;
        // вес
        $item5->weight = 8;
        // цена
        $item5->price = 5000;

        // Сохраняем
        $player->ownItemList[] = $item1;
        $player->ownItemList[] = $item2;
        $player->ownItemList[] = $item3;
        $player->ownItemList[] = $item4;
        $player->ownItemList[] = $item5;
        // сохраняем только первую таблицу
        \R::store($player);
    }

    // Вывод с определенными условиями
    public function testStructureLoad()
    {
        // Загрузили таблицу с пользователем
        $player = \R::load('player', 3);
        // Обратились к нему и отсартировали его по цене (от большего) и обратились к свойству что отсортировать.
        // with --- отсортировать и лимит тока можно указать
        $playerItems = $player->with('ORDER BY `price` DESC')->ownItemList;
        // Выводим все через цикл foreach
        foreach ($playerItems as $item) {
            echo 'Item: ' . $item['model'] . ' (Цена: ' . $item['price'] . ' Золото)<br>';
        }

        // withCondition
        echo '<br>  ------------------------------------------------------------------------------ <br>';
        // withCondition --- укозать условия, отсортировать , лимит
        // Указываем что только вывести шиты и отсорировать по весу начиная с легкого
        $playerItems = $player->withCondition('`type` = "shield" ORDER BY `weight` ASC')->ownItemList;
        // Выводим все через цикл foreach
        foreach ($playerItems as $item) {
            echo 'Item: ' . $item['model'] . ' (Цена: ' . $item['price'] . ' Золото, Вес: ' . $item['weight'] .')<br>';
        }

        // withCondition пример с условием если много его
        echo '<br>  ------------------------------------------------------------------------------ <br>';
        // Загружаем пользователя
        $player = \R::load('player', 1);
        // Если мы берем болбше одного условия, надо все взять в копки (для избежание ошибок)
        // Указываем что только вывести еду и отсорировать по весу начиная с легкого
        $playerItems = $player->withCondition('(`type` = "food" AND `quantity` = 6) ORDER BY `weight` ASC')->ownItemList;
        // Выводим все через цикл foreach
        foreach ($playerItems as $item) {
            echo 'Item: ' . $item['model'] . '  Вес: ' . $item['weight'] .'<br>';
        }

        // если что то сложно то лутче использовать getAll
    }

    // экономия ресурса при добовление
    public function testStructureAdd()
    {
        // Загрузили таблицу с пользователем
        $player = \R::load('player', 3);

        // Если вам надо добавить что то в таблицу без загрузки связей, то используйте
        //$player->ownItemList[] = $item;
        // Можно использовать такую систему что бы ненагружать бд

        $nItem = \R::dispense('item');
        // Что за тип предмета
        $nItem->type = 'что то';
        $nItem->model = 'Щит орка';
        $nItem->quantity = 1;
        $nItem->weight = 8;
        $nItem->price = 5000;
        $player->noLoad()->ownItemList[] = $nItem;
        \R::store($player);
        // будет меньше есть систему, а загрузится тоже самое
    }


    // Меньше кушать систему
    public function testStructureCount()
    {
        // Загрузили таблицу с пользователем
        $player = \R::load('player', 3);
        // Можно через count
        echo 'Кол-во. предметов: ' . count($player->ownItemList);
        // Или можно так через функцию Альса
        echo 'Кол-во. предметов: ' . sizeof($player->ownItemList);
        // Такие запросы
        // SELECT `player`.*  FROM `player`  WHERE ( `id` IN ( :slot0 ) )
        // SELECT `item`.*  FROM `item`  WHERE player_id = ?
        echo '<br>  ------------------------------------------------------------------------------ <br>';
        // Этот запрос будет нетак сильно кушать вашу бд
        echo 'Кол-во. предметов: ' . $player->countOwn('item');
        // Такие запросы
        // SELECT `player`.*  FROM `player`  WHERE ( `id` IN ( :slot0 ) )
        // SELECT COUNT(*) FROM `item`  WHERE player_id = ?
        echo '<br> ';
        // Так же само можно совмешать условия
        echo 'Кол-во. предметов, где вес больше 10: ' . $player->withCondition('`weight` > 6 ')->countOwn('item');
    }


    // WIPE & NUKE
    // https://redbeanphp.com/index.php?p=/crud
    public function dellAll()
    {
        // Удалить все что в таблице есть
        //\R::wipe('testuser');
        // Удалить все таблици что есть в БД (взрываеи бд) удоляет все
        //\R::nuke();
    }
}

