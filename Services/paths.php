<?php

namespace Services;

abstract class paths
{
    static function part($_file)
    {
        return globals::get('PARTS') . '\\' . $_file;
    }

    static function view($_view)
    {
        return globals::get('VIEWS') . $_view;
    }

    static function template($_view)
    {
        return globals::get('VIEWS').'\Templates\\' . $_view;
    }

    static function resource($_path)
    {
        return '/Resources/' . $_path;
    }

    static function xml($file) {
        return globals::get('ROOT').'\Resources\xml\\'.$file;
    }

    static function layout($file) {
        return globals::get('ROOT').'\Resources\layouts\\'.$file;
    }
}

?>
