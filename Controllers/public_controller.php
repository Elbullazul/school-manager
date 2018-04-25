<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-18
 * Time: 09:55
 */

namespace Controllers;

use Services\posts;
use Services\links;
use Core\security;

class public_controller extends controller
{
    function login() {
        parent::view(links::get('login'));
    }

    function connecting() {
        $pw = posts::get("inputPassword");
        $usr = posts::get("inputUser");

        security::authenticate(array("username" => $usr, "password" => $pw));
    }

    function home()
    {
        return links::get('login');
    }

}