<?php

require_once 'Core\methods.php';

// include class file on instantiation
spl_autoload_register(
    function ($className) {
        $filename = __DIR__ . "\\" . str_replace("\\", '/', $className) . ".php";
        if (file_exists($filename)) {
            load($filename);
            if (class_exists($className)) {
                return TRUE;
            }
        }
        return FALSE;
    }
);

$app = new \Core\application();