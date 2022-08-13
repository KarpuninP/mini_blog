<?php

namespace App\Utils;

class Cache
{
    // Использовать будем патерн синглтон
    use TSingletone;

    // что то запишем
    public function set($key, array $data, int $seconds = 3600): bool
    {
        // у нас будут отдельные данные и время для того что бы знать устарел кеш да или нет он хранится 1 час ( 3600 сек)
        if($seconds){
            $content['data'] = $data;
            // конечное время он будет равен времени плюс количество секунт на которое мы кешируем
            $content['end_time'] = time() + $seconds;
            // Дальше мы записываем данные в кеш, шифровать и стерелизуем его
            if(file_put_contents(CACHE . '/' . md5($key) . '.txt', serialize($content))){
                // если у нас все получилось мы вернуем true
                return true;
            }
        }
        // Если у нас нечего не получилось будет false
        return false;
    }

    // Что то получим
    public function get(string $key): array|bool
    {
        // Получаем этот фаил
        $file = CACHE . '/' . md5($key) . '.txt';
        // проверяем если эти файлы
        if(file_exists($file)) {
            // Делаем все обратно и помешаем в переменную
            $content = unserialize(file_get_contents($file));
            // Проверяем не устарели ли текушие данные
            if(time() <= $content['end_time']){
                // если они не устарели тогда мы их вернем
                return $content['data'];
            }
            // если проверку не прошли, значит данных нет или они устарели
            // Удаляем фаил
            unlink($file);
        }
        // Возрашаем если мы невернули контент
        return false;
    }

    // Удалить кеш. Типо что то обновить (пересобрать надо будет)
    public function delete($key): void
    {
        // Получаем путь файлу
        $file = CACHE . '/' . md5($key) . '.txt';
        // если такой фаил сушествует то его удаляем
        if(file_exists($file)){
            unlink($file);
        }
    }
}