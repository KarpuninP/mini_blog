<?php

namespace App\Controller;

class PracticeController extends TypeController
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        // Get parameter check
        $index = $this->getReqParam('practice');
//        var_dump($index);

        $data = [
            'namePage' => 'Practical section',
            'descriptionPage' => 'A practical record of certain technologies is displayed',
        ];

        // We add to the end of the $data array what came from the dbData method
        // In the dbData method comes an array with data to display for the site and an array with pagination
        $data = array_merge($data, $this->dbData('practice', $index));

//       debug($data);

        // Metadata
        $this-> setMeta (
            'Main page',
            'Here is the information about the interview',
            'Interview in php, practical part'
        );
        // Returns the template to the connection and data transfer
        $this-> view('main.main', $data);
    }
}