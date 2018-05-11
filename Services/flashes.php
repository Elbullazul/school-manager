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
        $flashes = [];

        if (sessions::is_set('flashes')) {
            $flashes = sessions::get('flashes');
            sessions::destroy('flashes');
        }

        return $flashes;
    }

    static function set($_msg, $_idx, $sticky = false)
    {
        $_SESSION['flashes'][$_idx][] = ['text' => $_msg, 'sticky' => $sticky];
    }

    static function gen_class($_idx)
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

        return 'alert-'.$type;
    }
}

?>
