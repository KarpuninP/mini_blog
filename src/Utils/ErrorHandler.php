<?php

namespace App\Utils;

use JetBrains\PhpStorm\NoReturn;

class ErrorHandler
{
    // In the config->init.php file, we created the debag constant and we will use it here
    // Then we will catch all these exceptions
    public function __construct()
    {
        // Error display
        // If debug constant is 1 (true) then we use error output. And if zero (fulls) then no
        if (DEBUG) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(-1);
        } else {
            error_reporting(0);
        }

        // Next, we throw them into this anonymous function
        set_exception_handler([$this, 'exceptionHandler']);
    }

    // In this function, we catch errors and connect the 2 functions that are written below, here we just interfere with what is needed in the function
    public function exceptionHandler(object $e): void
    {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    // Error logging
    protected function logErrors(string $message = '', string $file = '', string $line = ''): void
    {
        // We write down the error (date / year / time), then the text of the error, then we indicate in which file the error is and which line, then reset to a new line,
        // C grade means that we write it to a file and say the path of the file.
        error_log("[" . date('Y-m-d H:i:s') . "] Error text: {$message} | File: {$file} | Line: {$line}\n=================\n", 3, ROOT . '/tmp/errors.log');
    }

    // Error output (error display), error template connection.
    // Here we will create a public->errors folder and it will contain 3 files 404.php / dev.php / prod.php
    #[NoReturn]
    protected function displayError(string $errno, string $errstr, string $errfile, int $errline, int $responce = 404): void
    {
        // If $response is 404 and constant debug falls (=0) then display page with 404 error
        // This means that users do not need to see what the error is (when already in production)
        http_response_code($responce);
        if ($responce == 404 && !DEBUG) {
            require VIEW . '/errors/404.template.php';
            die;
        }
        // If the debug is 1 (true), then we connect dev.php otherwise prod.php and then cuts down
        if (DEBUG) {
            require VIEW . '/errors/dev.template.php';
        } else {
            require VIEW . '/errors/prod.template.php';
        }
        die;
    }
}