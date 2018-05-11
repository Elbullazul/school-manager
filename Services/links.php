<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-17
 * Time: 11:19
 */

namespace Services;

use const Core\RESOURCES;

abstract class links
{
    static function get($tag)
    {
        $path = "";
        $file = RESOURCES . '\xml\links.xml';
        $xml = simplexml_load_file($file);

        foreach ($xml as $node) {
            if ($node->tag == $tag) {
                $path = $node->path;
                break;
            }
        }

        return $path;
    }
}