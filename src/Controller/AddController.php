<?php

namespace App\Controller;

use App\Model\Blog;
use App\Utils\Base\Controller;
use Exception;
use JetBrains\PhpStorm\ArrayShape;
use RedBeanPHP\RedException\SQL;

class AddController extends Controller
{
    public function  __construct()
    {
        parent::__construct();
        $this->nameModal = new Blog();
    }

    /**
     * @throws SQL
     */
    public function index(): void
    {
        // Checking by which method the request came
        //var_dump($_SERVER['REQUEST_METHOD']);
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data = [
                'namePage' => 'Add text to blog',
                'descriptionPage' => 'Here you can add text to the blog. With a given theme and section',
                'themesList' => $this->themesList()
            ];

        }else {
            // Run the start() method, it returns the post id
            $idPost = $this->start();

            $false = [
                'namePage' => 'Information !!!',
                'descriptionPage' => 'Congratulations your text has been submitted to the database. Everything went well!',
                'error' => false
            ];

            $true = [
                'namePage' => 'Information !!!',
                'descriptionPage' => 'Sorry, your message has not been saved to the database.',
                'error' => true
            ];

            // Check if a number has arrived and is equal to 0, then the message has been sent
            $data= (is_numeric($idPost) && $idPost != 0)  ? $false : $true;
            if($data['error']) {
                error_log("[" . date('Y-m-d H:i:s') . "] Error text: For some reason, the record was not added to the database | Файл: src/Controller/AddController.php, method index  \n=================\n", 3, ROOT . '/tmp/errors.log');
            }
        }
        $data['link'] = 'add';
//      var_dump($data);

        // Metadata
        $this-> setMeta (
            'Main page',
            'here is the information about the interview',
            'php interview interview answers'
        );
        // Returns the template to the connection and data transfer
        $this-> view('add.add', $data);
    }

    /**
     * @throws SQL
     * @throws Exception
     */
    // Start
    public function start(): int|string
    {
        //var_dump($_POST);
//        If the add button is pressed
        if (isset($_POST['send'])) {
            // Run the update or add method
            $data = $this->add($_POST);
//      If the edit button is pressed
        } elseif (isset($_POST['edit'])) {
//            var_dump($_POST);
            $data = $this->edit($_POST);
//          If the delete button is clicked
        } elseif (isset($_POST['dell'])) {
//            var_dump($_POST);
            $data = $this->dell($_POST);
        } else {
            throw new Exception("It came in other ways (hacking)", 500);
        }
        return $data ;
    }

    /**
     * @throws SQL
     * @throws Exception
     */
    // Creates a post
    public function add(array $post): int|string
    {
        // var_dump($post);
        $data = $this->validation($post);
        //var_dump($data);

        // We run the create method in the Blog () model and pass the validated data there
        return $this->nameModal->create($data['type'], $data['themes'], $data['index'], $data['comment']);
    }

    /**
     * @throws Exception
     */
    // Validation of incoming data
    #[ArrayShape(['type' => "mixed|string", 'themes' => "mixed", 'postId' => "int|null|string", 'index' => "mixed", 'comment' => "mixed"])]
    public function validation(array $post): array
    {
        // If not, then substitute an empty string
        $type = $post['type'] ?? '';
        $themes = $post['themes'] ?? '';
        $postId = $post['postId'] ?? '';
        $index = $post['index'] ?? 'index';
        $comment = $post['comment'] ?? 'text';

        // Variable check $type
        if ($type != 'theory' && $type != 'practice') {
            throw new Exception("Error, the type does not match the given parameters.File AddController.php", 500);
        }

        // Variable check $themes
        $lendThemes = strlen($themes);
        if (!$lendThemes || $lendThemes <= 0 || $lendThemes > 50) {
            throw new Exception("Error, the themes does not match the given parameters.File AddController.php", 500);
        }

        if (!is_numeric($postId) && $postId !== '') {
            throw new Exception("Error, the id does not match the given parameters.File AddController.php", 500);
        }

        // Variable check $index
        $lendIndex = strlen($index);
        if (!$lendIndex || $lendIndex <= 0 || $lendIndex > 250) {
            throw new Exception("Error, the index does not match the given parameters.File AddController.php", 500);
        }

        // Variable check $comment
        $lendComment = strlen($comment);
        if (!$lendComment || $lendComment < 0 || $lendComment > 50000) {
            throw new Exception("Error, the text does not match the given parameters.File AddController.php", 500);
        }

        // We remove the ability to insert malicious code (encode / escape special characters)
        $themes = filter_var($themes, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $index = filter_var($index, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $comment = filter_var($comment, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        return [
            'type' => $type,
            'themes' => $themes,
            'postId' => $postId,
            'index' => $index,
            'comment' => $comment
        ];

    }

//  Get an array of tags
    public function themesList(): ?array
    {
        return $this->nameModal->taglist();
    }

    /**
     * @throws Exception
     */
//    Edit post
    public function edit(array $post): int
    {
        $data = $this->validation($post);
//        var_dump($data);
        return $this->nameModal->edit($data['postId'], $data['type'], $data['index'], $data['comment']);
    }

    /**
     * @throws Exception
     */
    // Delete post
    public function dell(array $post): int
    {
//        var_dump($post);
        $data = $this->validation($post);
        // Start the removal
        return $this->nameModal->remove($data['postId'], $data['type'], $data['themes']);
    }
}