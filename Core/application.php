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

        $crutch = new pseudo_controller();
        $crutch->start();
    }
}