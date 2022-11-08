<?php

namespace App\Utils;

class Registry
{
    // Implementations of the singleton pattern connect trail
    use TSingletone;

    // here we will put all our properties
    protected static array $properties = [];

    // Here we create a key and a value.
    public function setProperty(string $name, string|array $value): void
    {
        self::$properties[$name] = $value;
    }

    // If it exists then we will return it, if not then we will return null
    public function getProperty(string $name): array|null
    {
        if (isset(self::$properties[$name])) {
            return self::$properties[$name];
        }
        return null;
    }

    // Will print all available properties (for debugging or to see what's there)
    public function getProperties(): array
    {
        return self::$properties;
    }
}