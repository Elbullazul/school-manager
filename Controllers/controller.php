<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-17
 * Time: 13:22
 */

namespace Controllers;


use Services\globals;
use Services\links;
use Services\paths;
use Services\xml;

abstract class controller
{
    protected $actions = array();

    function __construct()
    {
        // TODO: load authorized actions; for now, just an array
        $this->actions = array();
    }

    function view($tag)
    {
        if ($this->is_authorized($tag)) {
            globals::set('VIEW_TITLE', links::label($tag));
            globals::set('VIEW_TAG', $tag);
            globals::set('VIEW', links::get($tag) . '.php');

            load(paths::view('\Templates\master.php'));
        } else {
            error('@SYS01');
        }
    }

    function is_authorized($action)
    {
        return (in_array($action, $this->actions));
    }

    abstract function home();
}