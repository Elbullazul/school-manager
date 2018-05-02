<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 19:27
 */

namespace Plugins\Rendering;

use const Core\PLUGINS;

class parser
{
    const DIRECTORY = PLUGINS.'\Controls';

    function __construct()
    {

    }

    function render($object) {
        return $object->render();
    }
}