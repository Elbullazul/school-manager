<?php

use Services\globals;
use Services\users;
use Services\paths;
use Services\labels;
use Services\links;
use Services\xml;

// TODO: load menu file
$file = str_replace('.php', '', globals::get('VIEW')) . '/' . users::type() . '.xml';
$griditems = xml::parse(paths::layout($file));

// If no available actions
if (!is_array($griditems)) {

    echo labels::get($griditems);

} else {
    // wrap in extra array if output doesn't match the expected format
    $griditems['menuitem'] = isset($griditems['menuitem'][0]) ? $griditems['menuitem'] : array($griditems['menuitem']);

    foreach ($griditems['menuitem'] as $item) {
        $view = $item["tag"];
        $label = $item["label"];

        $lnk = $view; // TODO : cleanup
        $lbl = labels::get($label);

        // TODO: Implement this in cleaner manner
        $html = '<a class="link-no-underline col-sm-4 center-block grid-item" href="' . $lnk . '">';
        $html = $html . '<div class="row img-container text-center"><img class="img-fluid" src="' . paths::resource('img/placeholder.png') . '"/>';
        $html = $html . '</div><div class="row text-center"><h2 class="container-fluid">' . $lbl . '</h2></div></a>';

        echo $html;
    }
}