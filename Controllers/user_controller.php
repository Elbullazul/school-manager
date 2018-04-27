<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-18
 * Time: 09:51
 */

namespace Controllers;

use Core\security;
use Services\users;
use Services\links;
use Services\labels;

class user_controller extends controller
{
    public function __call($name, $arguments)
    {
        error(labels::get('@SYS01'));
    }

    function dashboard()
    {
        $this->view(links::get('dashboard'));
    }

    function logout()
    {
        users::disconnect();
        redirect(links::get('login'));
    }

    function view($tag, $data = array())
    {
        security::access();
        parent::view($tag, $data);
    }

    function home()
    {
        return links::get('dashboard');
    }
}