<?php

namespace Services;

use const Core\RESOURCES;

abstract class titles
{
    static function get($path)
    {
        $label = "";
        $file = RESOURCES . '\xml\links.xml';
        $xml = simplexml_load_file($file);

        foreach ($xml as $node) {
            if ($node->path == (string)$path) {
                $label = (string)$node->title;
                break;
            }
        }

        $title = labels::get($label);
        return $title;
    }

}