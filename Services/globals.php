<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-17
 * Time: 11:22
 */

namespace Services;


class globals
{
    static function get($key) {
        return $GLOBALS[$key];
    }

    static function get_once($key) {
        $value = $GLOBALS[$key];
        self::destroy($key);

        return $value;
    }

    static function set($key, $value) {
        $GLOBALS[$key] = $value;
    }

    static function destroy($key) {
        $GLOBALS[$key] = NULL;
    }

    static function is_set($key) {
        return isset($GLOBALS[$key]);
    }
}