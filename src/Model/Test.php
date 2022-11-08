<?php

namespace App\Model;

use App\Utils\Base\Model;

class Test extends Model
{

    public function test(): array
    {
        $test = \R::getAll('SELECT * FROM test');
        $consol = \R::getDatabaseAdapter()
            ->getDatabase()
            ->getLogger();
        $consol->grep('SELECT');

        return ['result' => $test, 'request' => $consol];
    }

// gangs (delete) exec function example (request preparation) you can write any request
    public function execDel(): string
    {
        return \R::exec('DELETE FROM `test` WHERE  `id` = ? OR `id` = ?', array(
            1,
            2
        ));
    }

    // exec - this request preparation function, genSlots are question marks
    public function execUpd()
    {
        $id = [1, 2, 4, 5];
        $users = \R::exec("UPDATE `testuser` SET `many` = 28  WHERE  `id` IN (" . \R::genSlots($id) . ")", $id);

        var_dump($users);
        var_dump(\R::genSlots($id));
    }

    // Add user to table and return his id
    public function execInsert()
    {
        $users = \R::exec('INSERT INTO `testuser` (`name`, `age`, `email`) VALUES (?,?,?)', ['Artur', 15, 'jdj@gmail.com']);
        echo 'Last insert id: ' . \R::getInsertID();
    }

// table creation
    public function add()
    {
        $testUser = \R::dispense('testuser');
        $testUser->name = 'Ted';
        $testUser->age = 18;
        $testUser->contry = 'UA';
        $testUser['many'] = 150.5454;
        return \R::store($testUser);
    }


// Load one of the databases by id
    public function load()
    {
        $user = \R::load('testuser', 3);
        var_dump($user);
        echo 'Имя: ' . $user['name'];
    }

    // load All
    public function loads()
    {
        $users = \R::loadAll('testuser', [3, 2, 1]);
        var_dump($users);
        foreach ($users as $user) {
            echo 'Имя: ' . $user['name'] . '<br>';

        }

    }

    // Search
    public function find()
    {
        $users = \R::find('testuser', "`age` > ? ORDER BY `age` DESC", [19]);
        var_dump($users);

    }

    // searching and issuing a single query simply adds LIMIT 1 to the query
    public function findOne()
    {
        $users = \R::findOne('testuser', "`many` = ? ", [28]);

        var_dump($users);
    }

    // search and return everything in the table, does not accept a where string, can only sort
    public function findAll()
    {
        $users = \R::findAll('testuser', "ORDER BY `age` DESC");
        var_dump($users);
    }

    // PDO Database Cursor, in short, to get a large amount of data from BV without consuming application memory.
    // https://habr.com/ru/company/lamoda/blog/455571/
    // https://redbeanphp.com/index.php?p=/finding
    public function findCol()
    {
        $users = \R::findCollection('testuser', "ORDER BY `age` DESC");
        while ($user = $users->next()) {
            echo 'Имя: ' . $user['name'] . '<br>';
        }
    }

    //  It's not like syntax, it's IN syntax
    // SELECT `testuser`.*  FROM `testuser`  WHERE ( `name` IN ( :slot0,:slot1 ) ) ORDER BY `age` ASC
    // https://redbeanphp.com/index.php?p=/finding
    public function findLike()
    {
        $users = \R::findLike('testuser', ['name' => ['Ted', 'Tom']], "ORDER BY `age` ASC");
        debug($users);
    }

    // If it doesn't find it, it will create it.
    // https://redbeanphp.com/index.php?p=/finding
    public function findCreate()
    {
        $users = \R::findOrCreate('testuser', [
            'name' => 'Ron',
            'age' => 50
        ]);
        debug($users);
    }

    // Regular Count
    //  SELECT COUNT(*) FROM `testuser`
    // https://redbeanphp.com/index.php?p=/counting
    public function count()
    {
        echo 'Всего пользователей в БД: ' . \R::count('testuser');
    }

    // Updating is easy, first you need to load, then fix (as an array) and then save
    public function update()
    {
        $user = \R::load('testuser', 6);
        $user->contry = 'France';
        \R::store($user);
        var_dump($user);
    }

    // take everything and work through the loop and keep everything too / performance gain
    public function updateFindAll()
    {
        $users = \R::findAll('testuser');
        foreach ($users as $user) {
            $user->age = $user->age + 2;
        }
        \R::storeAll($users);
        var_dump($users);
    }

    // If we need an Array and work with an array / this way we can win in terms of performance
    public function updateArr()
    {
        $user = \R::load('testuser', 5);
        $user = $user->export();
        var_dump($user);

        \R::exec('UPDATE testuser SET ' . (array_keys($user)[2]) . ' = ?  WHERE id = ?', [20, 5]);
    }

    // Example of a normal delete
    public function dell()
    {
        $users = [];
        $user = \R::load('testuser', 2);
        \R::trash($user);

        \R::trashAll($users);
    }


    // Request getAll
    public function getAll()
    {
        $result = \R::getAll('SELECT * FROM `testuser` WHERE `contry` = ? ORDER BY `age`', ['USA']);
        var_dump($result);
    }

    // get Row request / returns the first record / must always be appended at the end of LIMIT 1
    public function getRow()
    {
        $result = \R::getRow('SELECT * FROM `testuser` ORDER BY `age` LIMIT 1');
        var_dump($result);
    }

    // returns an array of first cells (in our case id and name )
    public function getCol()
    {
        $result = \R::getCol('SELECT * FROM `testuser` ORDER BY `age` ');
        var_dump($result);

        $result = \R::getCol('SELECT `name` FROM `testuser` ORDER BY `age` ');
        var_dump($result);
    }


    // Convert Regular Array to Bean
    public function convertToBean()
    {
        $result = \R::getAll('SELECT * FROM `testuser` WHERE `contry` = ? ORDER BY `age`', ['USA']);
        $bean = \R::convertToBean('testuser', $result[0]);
        $beans = \R::convertToBeans('testuser', $result);
        var_dump($bean);
        var_dump($beans);
    }


    // One to many
    public function oneToManySet()
    {
        $player = \R::dispense('player');
        $player->nickname = 'Коте_98';

        $item1 = \R::dispense('item');
        $item1->type = 'pistol';
        $item1->model = 'Five Seven';
        $item1->quantity = 1;

        $item2 = \R::dispense('item');
        $item2->type = 'potion';
        $item2->model = 'Healing Orb';
        $item2->quantity = 7;

        $player->ownItemList[] = $item1;
        $player->ownItemList[] = $item2;
        \R::store($player);
    }

    // Table view / One to many call
    public function oneToManyLoad()
    {
        $player = \R::load('player', 1);
        var_dump($player->ownItemList);

        echo 'Персонаж: ' . $player->nickname . '<br>';
        echo '<strong>Предметы персонажа</strong><br>';

        foreach ($player->ownItemList as $item) {
            echo $item->model . ' (x' . $item->quantity . ')<br>';
        }
    }

    // Adding an item
    public function oneToManyAdd()
    {
        $player = \R::load('player', 1);
        $item = \R::dispense('item');
        $item->type = 'sword';
        $item->model = 'Двуручный меч';
        $item->quantity = 1;

        $player->ownItemList[] = $item;
        \R::store($player);
    }

    // Removal
    public function oneToManyDel()
    {
        $player = \R::load('player', 1);
        \R::trash($player->ownItemList[5]);
    }


    // Break the link with the table without removing
    public function oneToManyUnset()
    {
        $player = \R::load('player', 1);
        unset($player->ownItemList[5]);
        \R::store($player);
    }


    // Break the link with the table and deleting the row
    public function oneToManyXUnset()
    {
        $player = \R::load('player', 1);
        unset($player->xownItemList[5]);
        \R::store($player);
    }

    // manyToOne
    public function manyToOneSet()
    {
        $item = \R::dispense('item');
        $item->type = 'food';
        $item->model = 'Apple';
        $item->quantity = 3;

        $item->player = \R::load('player', 1);
        \R::store($item);
    }


    // View / download what happened
    public function manyToOneLoad()
    {
        $item = \R::load('item', 7);
        var_dump($item->player);
    }


    // Duplicate of the same item
    public function manyToOneDup()
    {
       $item = \R::load('item', 7);

       $dup = $item->export();
       $dup['id'] = false;

       $item->player->ownItemList[] = \R::convertToBean('item', $dup);
       \R::store($item->player);
    }


    // manyToMany principle
    // https://redbeanphp.com/index.php?p=/many_to_many
    public function manyToManySet()
    {
        list($article1, $article2) = \R::dispense('article', 2);
        // Запись 1
        $article1->title = 'Изучить RedBeanPhp';
        $article1->content = '.....';
        // Запись 2
        $article2->title = 'Отношение N11N в RedBeanPhp';
        $article2->content = '.....';

        $tag = \R::dispense('tag');
        $tag->name = 'RedBeanPhp';

        $article1->sharedTagList[] = $tag;
        $article2->sharedTagList[] = $tag;

        \R::storeAll([$article1, $article2]);
    }

    // An example of how to use the manyToMany table
    public function manyToManyLoad()
    {
        $article = \R::load('article', 1);
        echo $article->title . '<br>';
        echo $article->sharedTagList[1]->name;

        $tag = \R::load('tag', 1);
        echo $tag->name . '<br>';
        echo $tag->sharedArticleList[2]->title;
    }

    // Adding a test table
    public function testStructureSet()
    {
        $player = \R::dispense('player');
        $player->nickname = 'Dranglake';

        $item1 = \R::dispense('item');
        $item1->type = 'sword';
        $item1->model = 'Меч преследователя';
        $item1->quantity = 1;
        $item1->weight = 8;
        $item1->price = 952;

        $item2 = \R::dispense('item');
        $item2->type = 'shield';
        $item2->model = 'Щит дранглейка';
        $item2->quantity = 2;
        $item2->weight = 4;
        $item2->price = 2951;


        $item3 = \R::dispense('item');
        $item3->type = 'boots';
        $item3->model = 'Легенсы';
        $item3->quantity = 1;
        $item3->weight = 6;
        $item3->price = 3000;

        $item4 = \R::dispense('item');
        $item4->type = 'hood';
        $item4->model = 'Капишон теней';
        $item4->quantity = 1;
        $item4->weight = 1;
        $item4->price = 9000;

        $item5 = \R::dispense('item');
        $item5->type = 'shield';
        $item5->model = 'Щит орка';
        $item5->quantity = 1;
        $item5->weight = 8;
        $item5->price = 5000;

        $player->ownItemList[] = $item1;
        $player->ownItemList[] = $item2;
        $player->ownItemList[] = $item3;
        $player->ownItemList[] = $item4;
        $player->ownItemList[] = $item5;
        \R::store($player);
    }

    // Withdrawal with certain conditions
    public function testStructureLoad()
    {
        $player = \R::load('player', 3);
        $playerItems = $player->with('ORDER BY `price` DESC')->ownItemList;

        foreach ($playerItems as $item) {
            echo 'Item: ' . $item['model'] . ' (Цена: ' . $item['price'] . ' Золото)<br>';
        }

        // withCondition
        echo '<br>  ------------------------------------------------------------------------------ <br>';

        $playerItems = $player->withCondition('`type` = "shield" ORDER BY `weight` ASC')->ownItemList;
        foreach ($playerItems as $item) {
            echo 'Item: ' . $item['model'] . ' (Цена: ' . $item['price'] . ' Золото, Вес: ' . $item['weight'] .')<br>';
        }

        echo '<br>  ------------------------------------------------------------------------------ <br>';
        $player = \R::load('player', 1);
        $playerItems = $player->withCondition('(`type` = "food" AND `quantity` = 6) ORDER BY `weight` ASC')->ownItemList;
        foreach ($playerItems as $item) {
            echo 'Item: ' . $item['model'] . '  Вес: ' . $item['weight'] .'<br>';
        }
    }

    // resource saving when adding
    public function testStructureAdd()
    {
        $player = \R::load('player', 3);
        $nItem = \R::dispense('item');
        $nItem->type = 'что то';
        $nItem->model = 'Щит орка';
        $nItem->quantity = 1;
        $nItem->weight = 8;
        $nItem->price = 5000;
        $player->noLoad()->ownItemList[] = $nItem;
        \R::store($player);
    }


    // Eat less system
    public function testStructureCount()
    {
        $player = \R::load('player', 3);
        echo 'Кол-во. предметов: ' . count($player->ownItemList);
        echo 'Кол-во. предметов: ' . sizeof($player->ownItemList);

        // SELECT `player`.*  FROM `player`  WHERE ( `id` IN ( :slot0 ) )
        // SELECT `item`.*  FROM `item`  WHERE player_id = ?
        echo '<br>  ------------------------------------------------------------------------------ <br>';
        echo 'Кол-во. предметов: ' . $player->countOwn('item');
        // SELECT `player`.*  FROM `player`  WHERE ( `id` IN ( :slot0 ) )
        // SELECT COUNT(*) FROM `item`  WHERE player_id = ?
        echo '<br> ';
        echo 'Кол-во. предметов, где вес больше 10: ' . $player->withCondition('`weight` > 6 ')->countOwn('item');
    }


    // WIPE & NUKE
    // https://redbeanphp.com/index.php?p=/crud
    public function dellAll()
    {
        // Delete everything in the table
        //\R::wipe('testuser');
        // Уdelete all tables that are in the database (explode db) deletes everything
        //\R::nuke();
    }
}

