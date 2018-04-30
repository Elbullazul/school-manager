<?php

namespace Services;

abstract class flashes
{
    /* inspired by PhpFlashMessages: https://github.com/plasticbrain/PhpFlashMessages */

    const INFO = '1';
    const SUCCESS = '2';
    const WARNING = '3';
    const DANGER = '4';

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
