<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 20:19
 */

namespace Plugins\Rendering;

interface control
{
    function append(&$concat, $value);

    function remove(&$concat, $value);

    function contains($concat, $value);

    function add_class($class);

    function remove_class($class);

    function add_attribute($attribute);

    function remove_attribute($attribute);

    function set_id($id);

    function remove_id();

    function add_content($content);

    function clear_content();
}