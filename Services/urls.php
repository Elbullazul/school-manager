<?php

namespace Services;

abstract class urls
{
    static function get()
    {
        return gets::get('url');
    }

    static function parse()
    {
        return explode("/", self::get());
    }

    static function args()
    {
        $args = array();
        $url = gets::get_all();

        foreach ($url as $key => $value) {
            if ($key != 'url')
                $args[$key] = $value;
        }

        return $args;
    }
}

?>
