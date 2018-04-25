<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-17
 * Time: 11:19
 */

namespace Services;

abstract class links
{
    static function get($tag)
    {
        $path = "";
        $file = globals::get('RESOURCES') . '\xml\links.xml';
        $xml = simplexml_load_file($file);

        foreach ($xml as $node) {
            if ($node->tag == $tag) {
                $path = $node->path;
                break;
            }
        }

        return $path;
    }

    static function full_path($namespace, $tag) {
        $path = "";
        $file = globals::get('RESOURCES') . '\xml\links.xml';
        $xml = simplexml_load_file($file);

        foreach ($xml as $node) {
            if ($node->tag == $tag && $node->namespace == $namespace) {
                $path = $node->path;
                break;
            }
        }

        return $path;
    }
}