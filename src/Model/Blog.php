<?php

namespace App\Model;

use App\Utils\Base\Model;
use RedBeanPHP\OODBBean;
use RedBeanPHP\RedException\SQL;

class Blog extends Model
{
    // Loading the table
    public function load(string $table ,int $index = 1): array
    {
        $arrResult = [];
        $nameTable = $this->nameTable($table);
//        var_dump($nameTable);

        // Load all tags from database
        $tag = $this->taglist();
        if ($tag) {
            $idArr = [];
            // Looping through an array
            foreach ($tag as $idBean) {
                // Convert from Bean Array to Regular Array
                // Create a new array and put it in there
                // id of our tag
                $idArr[] = $idBean->export()['id'];
            }
    //        var_dump($idArr);

            // Checking if there is such an id in our array, if not, then we reassign it to 1
            if (!in_array($index, $idArr)){
                $index = 1;
            }
            // Checking if this table has properties. Top then this tag goes to another many to many table
            // If not then reassign $index to 1
            // Must get true or false
    //        var_dump((bool)!$tag[$themes]->$nameTable);
            if (!$tag[$index]->$nameTable) {
                $index = 1;
            }

            // After all the checks, we form a regular array of what we have chosen
            foreach ($tag[$index]->$nameTable as $v) {
                $arrResult[] = $v->export();
             }

            // Throw the subject tag into the array
            $arrResult['tag'] = $tag[$index]->export()['themes'];

    //        var_dump($arrResult);
        }
        return $arrResult;
    }

    // Create a table name in many to many
    public function nameTable(string $table): string
    {
        return 'shared' . ucfirst($table) . 'List';
    }

//  Get a list of tags
    public function taglist(): ?array
    {
        return \R::find('tag');
    }

    /**
     * @throws \Exception
     */
    // Returns the tag number of the given topic. Takes the title of the page theme
    public function tag(string $themes): array
    {
        $arrId = [];
        // We check what theme came in, in $ tag Theme we put the name of the table that needs to be loaded
        if ($themes == 'theory') {
            $tagTheme = 'tag_theory';
        }elseif ($themes == 'practice') {
            $tagTheme = 'practice_tag';
        }else {
            throw new \Exception("The corresponding topic of the page was not found, it came: $themes", 500);
        }

        // Load the selected table with the tag_id column, get an array
        $arrTagId = \R::getAll("SELECT tag_id FROM $tagTheme");
        // Remove duplicate elements and zero out array keys
        $arrTagId = array_values(array_unique($arrTagId, SORT_REGULAR));
        // We form a simple array, for easy enumeration
        foreach ($arrTagId as $v) {
            foreach ($v as $v1) {
                $arrId[] = $v1;
            }
        }
//        var_dump($arrId);
        return $arrId;
    }

    /**
     * @throws SQL
     */
    // Creates a table (text)
    public function create(string $table , string $themes, string $index, string $comment): int|string
    {
        // Using the many-to-many method
        // https://redbeanphp.com/index.php?p=/many_to_many
        // Create a table
        $data = \R::dispense($table);
        // Add data to this table
        $data['index'] = $index;
        $data['comment'] = $comment;

        // If there is a given string, then issue it, if not, then create and return
        // We refer to the $dat table and connect it to the tag table. A many-to-many relationship is created
        $tag = \R::findOrCreate('tag', ['themes' => $themes]);
        $data->sharedTagList[] = $tag;
        // Save to database and return id
        return \R::store($data);
    }


    //Finding a post to load into the editor
    public function findPost(int $id, string $tag, string $themes): ?OODBBean
    {
        $users = \R::findOne('tag', "`themes` = ? ", [$tag]);
        // Forming the correct title of the topic
        $sharedTableNameList = $this->nameTable($themes);
//        var_dump($users->$sharedTableNameList[$id]);
        return $users->$sharedTableNameList[$id];
    }

    /**
     * @throws SQL
     */
    // Edit post
    public function edit(int $id, string $table, string $index, string $comment): int|string
    {
        // Loading table
        $post = \R::load($table, $id);
        // Change what we want
        $post->index = $index;
        $post->comment = $comment;
        // Save
        return \R::store($post);
    }

    // Delete post
    public function remove(int $id, string $table, string $themes): int
    {
        // Find out what the post id tag is
        $tag = \R::findOne('tag', "`themes` = ? ", [$themes]);

        // Loading our post tag table
        $post = \R::load('tag', $tag['id']);
        // Form the correct title of the topic
        $sharedTableNameList = $this->nameTable($table);
        // Delete the connection and the post itself that is connected
        return \R::trash($post->$sharedTableNameList[$id]);
    }

    /**
     * @throws SQL
     */
    // User creation
    public function createUser(string $email, string $pass): int
    {
        // Creating or accessing a table
        $createUser = \R::dispense('user');
        // Fill in the data
        $createUser->email = $email;
        $createUser->password = $pass;
        // Save to database and return id
        return \R::store($createUser);
    }

    // Checking if email exists
    public function emailCheck(string $email): ?OODBBean
    {
        // Select by table name / where (what to look for) / array (data instead of ? should be in an array)
        return \R::findOne('user', "`email` = ? ", [$email]);
    }
}