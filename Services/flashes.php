<?php

namespace Services;

abstract class flashes
{
    /* inspired by https://github.com/plasticbrain/PhpFlashMessages */

    static $INFO = '1';
    static $SUCCESS = '2';
    static $WARNING = '3';
    static $DANGER = '4';

    static function get()
    {
        $flashes = sessions::get('flashes');

        if (sessions::is_set('flashes')) {
            sessions::destroy('flashes');
        }

        return $flashes;
    }

    static function set($_msg, $_idx, $sticky = false)
    {
        // TODO: This should be in the session util class
        $_SESSION['flashes'][$_idx][] = ['text' => $_msg, 'sticky' => $sticky];
    }

    static function get_name($_idx)
    {
        switch ($_idx) {
            case 1:
                $type = 'info';
                break;
            case 2:
                $type = 'success';
                break;
            case 3:
                $type = 'warning';
                break;
            case 4:
                $type = 'danger';
                break;
        }

        return $type;
    }
}

?>
