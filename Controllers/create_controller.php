<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-25
 * Time: 09:38
 */

namespace Controllers;

use Core\security;
use Services\links;

class create_controller extends controller
{
    function general()
    {
        $this->view(links::get('create-general'));
    }

    function course() {
        $this->view(links::get('create-course'));
    }

    function view($view)
    {
        security::access();
        parent::view($view);
    }

    function home()
    {
        return links::get('create-general');
    }

}