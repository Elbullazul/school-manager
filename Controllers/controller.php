<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-17
 * Time: 13:22
 */

namespace Controllers;

use Services\paths;
use Services\titles;

abstract class controller
{
    abstract function home();

    function view($view, $data = array())
    {
        $data['TITLE'] = titles::get($view);
        $data['TAG'] = $view;
        $data['FILE'] = $view . '.php';

        load(paths::template('master.php'), $data);
    }
}