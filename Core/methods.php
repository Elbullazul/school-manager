<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-17
 * Time: 13:03
 */

use Services\globals;
use Services\labels;
use Services\paths;
use Services\links;

function redirect($view)
{
    // clear current web page
    ob_start();
    ob_end_clean();

    header("Location: " . links::get($view));
}

function error($label)
{
    globals::set('ERROR', labels::get($label));
    load(paths::view('\public\error.php'));
}

function load($file)
{
    require_once $file;
}

// TODO: Remove this before going live
function dump($object)
{
    echo '<pre>';
    var_dump($object);
    echo '</pre>';
}