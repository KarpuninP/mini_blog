<?php

namespace App\Utils;

use RedBeanPHP\RedException;

class Db
{
// We will implement the singleton pattern
    use TSingletone;

    /**
     * @throws RedException
     * @throws \Exception
     */
    protected function __construct()
    {
        // We put the configuration files of our database into a connection variable
        $db = require_once CONF . '/config_db.php';
        // var_dump($db );
        // Connect RedBeanPHP
        class_alias('\RedBeanPHP\R', '\R');
        \R::setup($db['dsn'], $db['user'], $db['pass']);
        // We check if the connection is established, if not, we throw an exception.
        // Thanks to this library, we can check
        if (!\R::testConnection()) {
            throw new \Exception("No connection to database", 500);
        }
        // We do not need more RedBeanPHP functions in production (for example, change the table on the go) and when the project is in production
        // they need to be frozen for this we will use the function of this library \R::freeze(true)
        // https://redbeanphp.com/index.php?p=/fluid_and_frozen
        // If our freeze is true, then many redbeanphp functions will be disabled
        \R::freeze(!DEBUG);
        if (DEBUG) {
            // This debug mode is beautiful if DEBUG = DEBUG (development mode) then we will see the query table
            \R::debug(TRUE, 1);
        }
    }
}