<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-18
 * Time: 09:55
 */

namespace Controllers;


class public_controller extends controller
{
    function __construct()
    {
        // TODO: load authorized actions; for now, just an array
        $this->actions = array("login", "logout", "connecting");
    }

    function home()
    {
        return links::get('login');
    }

}