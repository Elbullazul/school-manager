<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-03
 * Time: 10:55
 */

namespace Services;

use const Core\RESOURCES;

abstract class access_registry
{
    static function find($tag)
    {
        $file = RESOURCES . '\xml\links.xml';
        $xml = simplexml_load_file($file);

        $has_access = false;
        $user_type = users::type();

        foreach ($xml as $node) {
            $node_tag = (string)$node->tag;

            if ($node_tag == $tag && $node->protected == 'true') {
                if ($node->$user_type == 'true') {
                    $has_access = true;
                    break;
                }
            }
        }

        return $has_access;
    }
}