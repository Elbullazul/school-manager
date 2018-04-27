<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 10:24
 */

namespace Services;


abstract class date
{
    static function now()
    {
        return date('Y-m-d');
    }
}