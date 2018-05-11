<?php

use Services\users;
use Services\paths;
use Services\labels;
use Services\links;
use Services\xml;

$file = str_replace('.php', '', $FILE) . '/' . users::type() . '.xml';
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

        $lnk = $view;
        $lbl = labels::get($label);

        ?>
        <a class="link-no-underline col-sm-3 center-block grid-item" href="<?= $lnk; ?>">
            <div class="row img-container text-center">
                <img class="img-fluid" src="<?= paths::resource('img/placeholder.png'); ?>"/>
            </div>
            <div class="row text-center">
                <h4 class="container-fluid pt-3"><?= $lbl; ?></h4>
            </div>
        </a>
        <?php
    }
}