<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-18
 * Time: 09:55
 */

namespace Controllers;


use Services\globals;
use Services\links;

class public_controller extends controller
{
//    public function __construct()
//    {
//        $this->directory = globals::get('VIEWS').'/public';
//    }

    function home()
    {
        return links::get('login');
    }

}