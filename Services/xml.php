<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-18
 * Time: 10:19
 */

namespace Services;


abstract class xml
{
    static function parse($file)
    {
        if (file_exists($file)) {
            if (filesize($file)) {
                $xml = simplexml_load_file($file);

                // HACK: convert to array
                $content = json_encode($xml);
                $content = json_decode($content, true);
            } else {
                $content = '@SYS09';
            }
        } else {
            // TODO: if users have access in all namespaces, change label
            //$content = '@SYS08';
            $content = '@SYS09';
        }

        return $content;
    }
}