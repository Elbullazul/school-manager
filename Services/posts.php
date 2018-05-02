<?php

namespace Services;

abstract class posts
{
    static function set($_key, $_value)
    {
        $_POST[$_key] = htmlentities($_value);
    }

    static function get($_key)
    {
        return isset($_POST[$_key]) ? htmlentities($_POST[$_key]) : "";
    }

    static function get_all()
    {
        return $_POST;
    }

    static function is_set($_key)
    {
        return (isset($_POST[$_key]));
    }

    static function are_set() {

        $keys = func_get_args();

        foreach ( $keys as $key) {
            if (!self::is_set($key))
                return false;
        }

        return true;
    }

    static function exists() {
        return isset($_POST);
    }

    static function empty() {
        return empty($_POST);
    }
}