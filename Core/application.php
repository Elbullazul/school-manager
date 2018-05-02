<?php

namespace Core;

use Services\labels;
use Tests\tests;

const ROOT = __DIR__.'\..';
const VIEWS = __DIR__.'\..\Views';
const PARTS = __DIR__.'\..\Views\Templates\Parts';
const RESOURCES = __DIR__.'\..\Resources';
const PLUGINS = __DIR__.'\..\Plugins';

class application {

    function __construct() {

        session_start();
        labels::set_locale();

        // TODO: Remove when going live
//        tests::run('courses');

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