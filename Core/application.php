<?php

namespace Core;

use \Services\globals;
use \Services\labels;

class application {

    function __construct() {

        session_start();

        // Set Superglobal variables
        globals::set('ROOT', __DIR__.'\..');
        globals::set('VIEWS', __DIR__.'\..\Views');
        globals::set('PARTS', __DIR__.'\..\Views\Templates\Parts');
        globals::set('RESOURCES', __DIR__.'\..\Resources');
        labels::set_locale();

        // different processing with AJAX calls
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            $ajax = new ajax_service();
            $ajax->start();
        } else {
            $controller = new pseudo_controller();
            $controller->start();
        }
    }
}