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
    function general() {
        $this->view(links::get('manage-general'));
    }

    function schedule() {
        $this->view(links::get('manage-schedule'));
    }

    function view($tag, $data = array())
    {
        security::access();
        parent::view($tag, $data);
    }

    function home()
    {
        return links::get('manage-general');
    }
}