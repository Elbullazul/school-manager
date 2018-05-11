<?php

use Services\labels;
use Services\flashes;

$flashes = flashes::get();

if (!empty($flashes)) {
    foreach ($flashes as $type => $messages) {
        foreach ($messages as $index => $message) {
            $html = '<div class="' . flashes::gen_class($type) . ' alert alert-solid mb-0 text-center alert-dismissible">';
            $html = $html . labels::get($message['text']);

            if ($message['sticky'] == false)
                $html = $html . '<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>';
            $html = $html . '</div>';

            echo $html;
        }
    }
}