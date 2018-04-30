<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-18
 * Time: 09:55
 */

namespace Controllers;

use Objects\Factories\users_factory;
use Services\flashes;
use Services\posts;
use Services\links;
use Core\security;

class public_controller extends controller
{
    function login() {
        parent::view(links::get('login'));
    }

    function connecting() {
        if (
            posts::is_set("inputPassword") &&
            posts::is_set('inputUser') &&
            !empty(posts::get("inputPassword")) &&
            !empty(posts::get("inputUser"))
        ) {

            $pw = posts::get("inputPassword");
            $usr = posts::get("inputUser");

            $bundle['user_id'] = NULL;
            $bundle['user_type'] = NULL;
            $bundle['username'] = $usr;
            $bundle['password'] = $pw;

            $user_model = users_factory::construct($bundle);

            security::authenticate($user_model);
            redirect(links::get('dashboard'));
        } else {
            flashes::set('@UI18', flashes::DANGER, true);
            redirect(links::get('login'));
        }
    }

    function home()
    {
        return links::get('login');
    }

}