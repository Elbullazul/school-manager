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
use Services\links;


class view_controller extends controller
{
    function general() {
        $this->view(links::get('view-general'));
    }

    function schedule()
    {
        $this->view(links::get('view-schedule'));
    }

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