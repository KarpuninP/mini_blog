<?php

namespace App\Controller;

class HomeController extends TypeController
{
    /**
     * @throws \Exception
     */
    public function index()
    {
//        var_dump(isset($_SESSION['isLogin']));
        // Get parameter check
        $index = $this->getReqParam('theory');
//       var_dump($index);

        $data = [
            'namePage' => 'Theoretical section',
            'descriptionPage' => 'A theory of certain technologies is being developed',
        ];

        // We add to the end of the $data array what came from the dbData method
        // In the dbData method, an array with data for displaying on the site and an array with pagination comes
        // Use the array_merge function to merge an array
        $data = array_merge($data, $this->dbData('theory', $index));

//        debug($data);

      // metadata
      $this-> setMeta (
          'Main page',
          'Here is the information about the interview',
          'php interview interview answers'
      );
      // Returns the template to the connection and data transfer
      $this-> view('main.main', $data);
    }
}