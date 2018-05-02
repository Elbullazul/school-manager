<?php

use Services\xml;
use Services\users;
use Services\paths;
use Services\labels;
use Services\links;

?>

<div class="dropdown-menu dropdown-menu-left text-left mobile-menu mt-0">
    <ul class="nav nav-pills flex-column flex-md-wrap">

        <?php

        // TODO: load menu file
        $file = "sidebar\\" . users::type() . '.xml';
        $sidebaritems = xml::parse(paths::xml($file));

        foreach ($sidebaritems as $sidebaritem) {
            foreach ($sidebaritem as $item) {
                foreach ($item as $name) {
                    $view = $item["tag"];
                    $label = $item["label"];
                }
                $lbl = labels::get($label);
                $lnk = $view; ?>
                <?=
                "<li class='nav-item'>
                    <a class='nav-link' href='$lnk'>$lbl<span class='sr-only'>(current)</span></a>
                </li>"; ?>
                <?php
            }
        }

        ?>

    </ul>
</div>