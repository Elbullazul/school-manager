<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-18
 * Time: 09:51
 */

namespace Controllers;


use Core\security;

class user_controller extends controller
{
    function __construct()
    {
        // TODO: load authorized actions; for now, just an array
        $this->actions = array("dashboard", "logout");
    }

    function view($tag)
    {
        security::access($tag);
        parent::view($tag);
    }

    function home()
    {
        return links::get('dashboard');
    }
}