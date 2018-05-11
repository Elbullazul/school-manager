<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-18
 * Time: 14:55
 */

namespace Controllers;

use Core\security;
use Services\links;

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
        security::access($tag);
        parent::view($tag, $data);
    }

    function home()
    {
        return links::get('manage-general');
    }
}