<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-17
 * Time: 12:58
 */

namespace Core;

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
            // TODO: if empty go to login
            error('@SYS01');
//            if (users::connected()) {
//                redirect('dashboard');
//            } else {
//                redirect('login');
//            }
        }
    }

    function start() {
        if (file_exists(paths::view('\\' . $this->query . '.php'))) {
            $controller = '\Controllers\\'.$this->namespace.'_controller';
            $controller = new $controller();

            $controller->view($this->action);
        } else {
            error('@SYS01');
        }
    }
}