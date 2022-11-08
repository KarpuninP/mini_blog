<?php

namespace App\Controller;

use App\Model\Blog;
use App\Utils\Base\Controller;

class TypeController extends Controller
{
    public function  __construct()
    {
        parent::__construct();
        $this->nameModal = new Blog();
    }

    /**
     * @throws \Exception
     */
    // We take data from the database with Madonna tables and run our model
    public function dbData(string $themes, int $index = 1): array
    {
        // We throw the model object into a variable
        $theoryData = $this->nameModal;
        // Throw it into an array with page parameters
        $data['page'] = $theoryData->tag($themes);
        // We put it in an array, then we need to issue data from the database
        $data['textDb'] = $theoryData->load($themes, $index);
        $data['nameTable'] = $themes;
//        var_dump($data);
        return $data;
    }

    /**
     * @throws \Exception
     */
    // Get parameter check
    public function getReqParam(string $themes): int
    {
        // What we received in Get parameters
        // If ours is not empty, we substitute what came with the get parameter, otherwise
        // Pass the first digit in the array to the given table
       return !empty($_GET['p']) ? $_GET['p'] : current($this->nameModal->tag($themes));
    }
}