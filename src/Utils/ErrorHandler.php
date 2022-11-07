<?php

namespace App\Utils;

use JetBrains\PhpStorm\NoReturn;

class ErrorHandler
{
    // В файле config->init.php мы создали константу debag и тут мы ее будем использовать
    // Дальше все эти исключение мы будем ловить
    public function __construct()
    {
        // Отображение ошибок
        // Если константа дебаг 1 (true) то мы используем вывод ошибок. А если ноль (fulls) то нет
        if (DEBUG) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(-1);
        } else {
            error_reporting(0);
        }

        // Далее мы их кидаем в эту анонимную функцию
        set_exception_handler([$this, 'exceptionHandler']);
    }

    // В этой функции ловим ошибки и соединяем 2 функции которые записаны ниже, тут мы просто помешаем то что надо в функции
    public function exceptionHandler(object $e): void
    {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    // логирование ошибок
    protected function logErrors(string $message = '', string $file = '', string $line = ''): void
    {
        // Записываем ошибку (дата/год/время) потом текст ошибки дальше указываем в каком файле ошибка и какая строка потом сброс на новую строку,
        // Троечка означает что мы записываем его в файл и сказываем путь файла.
        error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$message} | Файл: {$file} | Строка: {$line}\n=================\n", 3, ROOT . '/tmp/errors.log');
    }

    // вывод ошибок(показ ошибок), подключение шаблома ошибок.
    // Тут мы создадим папочку public->errors и в ней 3 файла 404.php / dev.php / prod.php
    #[NoReturn]
    protected function displayError(string $errno, string $errstr, string $errfile, int $errline, int $responce = 404): void
    {
        //если $responce будет 404 и константа дебаг фолс (=0) то тогда выводим страницу с 404 ошибкой
        // Это значит что пользователям ненужно видеть что за ошибка вышла (когда уже на продакшене)
        http_response_code($responce);
        if ($responce == 404 && !DEBUG) {
            require VIEW . '/errors/404.template.php';
            die;
        }
        // Если дебаг равен 1 (тру), то мы подключаем dev.php иначе prod.php и дальше вырубает
        if (DEBUG) {
            require VIEW . '/errors/dev.template.php';
        } else {
            require VIEW . '/errors/prod.template.php';
        }
        die;
    }
}