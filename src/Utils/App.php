<?php

namespace App\Utils;

class App
{
    // $app - temporary container
    public static object $app;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        // Starting the session
        session_start();

        // We create a class with our exceptions so that they connect
        new ErrorHandler();

        // We connect our registry (we can store all our parameters in it)
        self::$app = Registry::instance();
        // Call getParams to populate the Registry::instance container with data
        $this->getParams();

        // We connect our router
        $router = new Router();
        // Run the method
        $router->process();
    }

    // Getting settings from the config folder.
    protected function getParams(): void
    {
        // Let's put in the variable what is contained in params.php. Where we refer to the CONF constant (folder path)
        $params = require_once CONF . '/params.php';
        // If this array is not empty, then we will go through it and take the key and value separately
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                // Here we refer to the Registry class setProperty method and put the key and value there
                self::$app->setProperty($k, $v);
            }
        }
    }
}