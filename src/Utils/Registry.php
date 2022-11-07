<?php

namespace App\Utils;

class Registry
{
    // Реализации патерна синглтон подключаем трэил
    use TSingletone;

    // сюда мы будем класть все наши свойства
    protected static array $properties = [];

    // Тут мы создаем ключ и значение.
    public function setProperty(string $name, string|array $value): void
    {
        self::$properties[$name] = $value;
    }

    // если оно существует, тогда мы его вернем, если нет, то вернем null
    public function getProperty(string $name): array|null
    {
        if (isset(self::$properties[$name])) {
            return self::$properties[$name];
        }
        return null;
    }

    // Будит распечатывать все доступные свойства (для дебага или посмотреть что там есть)
    public function getProperties(): array
    {
        return self::$properties;
    }
}