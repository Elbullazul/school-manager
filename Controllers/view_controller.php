<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-23
 * Time: 09:01
 */

namespace Controllers;

use Core\security;
use Services\globals;


class view_controller extends controller
{
//    function __construct()
//    {
//        $this->directory = globals::get('VIEWS').'/view';
//    }

    function view($tag)
    {
        security::access($tag);
        parent::view($tag);
    }

    function home()
    {
        return '/view/general';
    }
}