<?php

use Services\globals;
use Services\users;
use Services\paths;
use Services\labels;
use Services\links;
use Services\xml;

// TODO: load menu file
$file = str_replace('.php', '', globals::get('VIEW')) . '/' . users::type() . '.xml';
$griditems = xml::parse(paths::xml($file));

// If no available actions
if (!is_array($griditems)) {

    echo labels::get($griditems);

} else {
    foreach ($griditems as $griditem) {
        foreach ($griditem as $item) {
            foreach ($item as $name) {
                $view = $item["tag"];
                $label = $item["label"];
            }

            $lnk = links::get($view);
            $lbl = labels::get($label);

            // TODO: Implement this in cleaner manner
            $html = '<a class="link-no-underline col-sm-4 center-block grid-item" href="' . $lnk . '">';
            $html = $html . '<div class="row img-container text-center"><img class="img-fluid" src="' . paths::resource('img/placeholder.png') . '"/>';
            $html = $html . '</div><div class="row text-center"><h2 class="container-fluid">' . $lbl . '</h2></div></a>';

            echo $html;
        }
    }
}