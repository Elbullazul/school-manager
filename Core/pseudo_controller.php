<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-17
 * Time: 12:58
 */

namespace Core;

use Services\links;
use Services\paths;
use Services\urls;

class pseudo_controller
{
    private $namespace;
    private $action;
    private $query;

    function __construct()
    {
        $this->query = urls::get();
        $params = urls::parse();

        if (!empty($this->query) && count($params) >= 2) {
            $this->namespace = $params[0];
            $this->action = $params[1];
        } else {
            redirect(links::get('login'));
        }
    }

    function start() {

        $controller = '\Controllers\\'.$this->namespace.'_controller';

        if (!class_exists($controller)) {
            error('@SYS01');
        } else {
            $controller = new $controller();
            $func = $this->action;

            if (!method_exists($controller, $func)) {
                error('@SYS01');
            } else {
                $controller->$func();
            }
        }
    }
}