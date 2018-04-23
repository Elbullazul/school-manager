<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-17
 * Time: 13:22
 */

namespace Controllers;

use Services\paths;
use Services\globals;
use Services\titles;

abstract class controller
{
    protected $directory = '';

//    abstract function __construct();

    abstract function home();

    function view($view)
    {
        globals::set('VIEW_TITLE', titles::get($view));
        globals::set('VIEW_TAG', $view);    // sidebar tracking
        globals::set('VIEW', $view . '.php');

        load(paths::template('master.php'));
    }
}