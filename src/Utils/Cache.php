<?php

namespace App\Utils;

class Cache
{
    // We will use the singleton pattern
    use TSingletone;

    // Write to cache
    public function set($key, array $data, int $seconds = 3600): bool
    {
        // We will have separate data and time to know if the cache is outdated yes or no it is stored for 1 hour (3600 sec)
        if ($seconds) {
            $content['data'] = $data;
            // The final time it will be equal to the time plus the number of seconds for which we cache
            $content['end_time'] = time() + $seconds;
            // Next, we write the data to the cache, encrypt and sterilize it
            if (file_put_contents(CACHE . '/' . md5($key) . '.txt', serialize($content))) {
                // If we succeeded we will return true
                return true;
            }
        }
        // If we did not succeed, it will be false
        return false;
    }

    // Get cash
    public function get(string $key): array|bool
    {
        // Get this file
        $file = CACHE . '/' . md5($key) . '.txt';
        // Check if these files
        if (file_exists($file)) {
            // We do everything back and interfere with the variable
            $content = unserialize(file_get_contents($file));
            // Check if current data is out of date
            if (time() <= $content['end_time']) {
                // If they are not outdated then we will return them
                return $content['data'];
            }
            // If the check did not pass, then there is no data or they are outdated
            // Delete the file
            unlink($file);
        }
        // If we did not succeed, it will be false
        return false;
    }

    // Delete cache.
    public function delete($key): void
    {
        // Get file path
        $file = CACHE . '/' . md5($key) . '.txt';
        // If such a file exists, then delete it
        if (file_exists($file)) {
            unlink($file);
        }
    }
}