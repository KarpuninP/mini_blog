<?php

namespace App\Utils;

class Router
{
    /**
     * @throws \Exception
     */
    // start here
    public function process()
    {
            // We get an array with the full path of the controller and the name of the method that we want to pull (we got it all in the url)
            $action = $this->getAction();
            // We define it in our full path of the controller
            $controller = $action[0];
            // We define this as the name of the method
            $method = $action[1];
            // We look at our method and path of the controller
//          var_dump($method . ' - ' . $controller);
            // Create a controller
            $object = new $controller;
            // Run the method
            $object->$method();
            // Run base template
            $object->getView();
    }

    /**
     * @throws \Exception
     */
    // Breaks the url link and returns the name of the controller and method as an array.
    private function getAction(): array
    {
        // Getting PATH from a link
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        // We split the reference to the array by elements. 0 key is empty, 1 is controller, 2 is action(method)
        $url = explode('/', $url);
        // Forming a complete class namespace
        // If the first array key is empty, then run the HomeController
        if (empty($url[1])) {
            $controller = '\App\Controller\HomeController';
            // If there is something, that is, then we form the full path of this controller and write it with a capital letter, and append the word Controller
        } else {
            $controller = '\App\Controller\\' . ucfirst($url[1]) . 'Controller';
            // If such a class does not exist, then we issue an exception (check for the presence of a class)
            if (!class_exists($controller)) {
                throw new \Exception('There is no such class: ' . '"' . $controller . '"', 404);
            }
        }

        // If the second array key is empty, then the method will be index
        if (empty($url[2])) {
            $method = 'index';
            // Otherwise, the name of the second array
        } else {
            $method = $url[2];
            //var_dump($method);
        }
       // var_dump($method);
        // If there is no such method in the class, then we throw out the exception
        if (!method_exists($controller, $method)) {
            throw new \Exception('No method: "' . $method  . '" in class: ' . '"' . $controller . '"', 404);
        }

        // We return the full path of the controller and the name of the method in an array.
        return [$controller, $method];
    }
}