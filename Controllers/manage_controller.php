<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-18
 * Time: 14:55
 */

namespace Controllers;

use Services\globals;
use Services\links;
use Core\security;

class manage_controller extends controller
{
//    function __construct()
//    {
//        $this->directory = globals::get('VIEWS').'/manage';
//    }

    function view($tag)
    {
        security::access();
        parent::view($tag);
    }

    function home()
    {
        return '/manage/general';
    }
}