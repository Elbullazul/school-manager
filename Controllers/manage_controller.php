<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-18
 * Time: 14:55
 */

namespace Controllers;

use Services\links;
use Core\security;

class manage_controller extends controller
{
    function __construct()
    {
        // TODO: load authorized actions; for now, just an array
        $this->actions = array("users", "schedule", "grades", "calendar", "courses", "inscriptions", "instances", "general");
    }

    function view($tag)
    {
        security::access();
        parent::view($tag);
    }

    function home()
    {
        return links::get("general");
    }
}