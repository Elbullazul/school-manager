<?php

namespace Database;

use \PDO;

class connection
{
    private static $instance = NULL;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    static function getInstance()
    {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;

            self::$instance = new PDO('mysql:host=localhost;dbname=dogfish_db', 'root', '', $pdo_options);
        }
        return self::$instance;
    }
}