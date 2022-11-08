<?php

namespace App\Controller;

use RedBeanPHP\OODBBean;
use RedBeanPHP\RedException\SQL;


class EditController extends AddController
{
    /**
     * @throws SQL
     * @throws \Exception
     */
    public function index(): void
    {
        // Checking by which method the request came
        //var_dump($_SERVER['REQUEST_METHOD']);
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data = $this->validation($_GET);
//            var_dump( $data );
            $editPost = null;
            if ($data['postId'] !== '') {
                $editPost = $this->findPost($data['postId'], $data['themes'], $data['type']);
            }

            if (is_null($editPost)) {
                $data = [
                    'namePage' => 'Error, no such post found',
                    'descriptionPage' => 'You can write a new post or repeat the action one more time',
                    'link' => 'add'
                ];
            } else {
                $data = [
                    'namePage' => 'Edit blog text',
                    'descriptionPage' => 'Edit blog text',
                    'link' => 'edit',
                    'themes' => $data['type'],
                    'tag' => $data['themes'],
                    'editPost' => $editPost
                ];
            }
        } else {
            // Run the start() method, it returns the post id
            $idPost = $this->start();
//            var_dump($idPost);
            $false = [
                'namePage' => 'Information !!!',
                'descriptionPage' => 'Congratulations your text has been edited. Everything went well!',
                'link' => 'add',
                'error' => false
            ];

            $true = [
                'namePage' => 'Information !!!',
                'descriptionPage' => 'Unfortunately your post has not been edited.',
                'link' => 'add',
                'error' => true
            ];

            // Check if a number has arrived and is 0, then the message has been sent
            $data = (is_numeric($idPost) && $idPost != 0) ? $false : $true;
            if ($data['error']) {
                error_log("[" . date('Y-m-d H:i:s') . "] error text: For some reason, the record was not added to the database | File: src/Controller/AddController.php, method index  \n=================\n", 3, ROOT . '/tmp/errors.log');
            }
        }

//        var_dump($data);
        // Metadata
        $this->setMeta(
            'Post editing',
            'you can edit your post here',
            'php interview interview answers'
        );
        // Returns the template to the connection and data transfer
        $this->view('add.add', $data);
    }

    // Finds a post from the database that needs to be edited to upload to the page
    public function findPost(int $id, string $tag, string $themes): ?OODBBean
    {
        return $this->nameModal->findPost($id, $tag, $themes);
    }
}