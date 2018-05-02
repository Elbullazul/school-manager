<?php

namespace Services;

use const Core\PARTS;
use const Core\ROOT;
use const Core\VIEWS;

abstract class paths
{
    static function part($_file)
    {
        return PARTS . '\\' . $_file;
    }

    static function modal($_file)
    {
        return VIEWS . '..\Templates\Modals\\' . $_file;
    }

    static function view($_view)
    {
        return VIEWS . $_view;
    }

    static function template($_view)
    {
        return VIEWS.'\Templates\\' . $_view;
    }

    static function resource($_path)
    {
        return '/Resources/' . $_path;
    }

    static function xml($file) {
        return ROOT.'\Resources\xml\\'.$file;
    }

    static function layout($file) {
        return ROOT.'\Resources\layouts\\'.$file;
    }
}

?>
