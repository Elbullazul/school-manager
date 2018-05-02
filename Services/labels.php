<?php

namespace Services;

use const Core\RESOURCES;

abstract class labels
{
    static $locale = 'en_us';

    static function get($_label)
    {
        $text = "Localization error";
        $file = RESOURCES.'\xml\labels\\' . self::$locale . '.xml';
        $xml = simplexml_load_file($file);

        foreach ($xml as $node) {
            if ($node->key == $_label) {
                $text = (string)$node->text;
                break;
            }
        }

        return $text;
    }

    // get user browsing language
    static function get_locale()
    {
        return strtolower(locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']));
    }

    static function set_locale()
    {
        $current_locale = self::get_locale();
        if (file_exists('Resources/xml/labels/' . $current_locale . '.xml')) {
            self::$locale = $current_locale;
        }
    }
}

?>
