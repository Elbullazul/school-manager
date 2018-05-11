<?php

use Services\xml;
use Services\users;
use Services\paths;
use Services\labels;
use Services\links;

?>

<ul class="nav nav-pills flex-column flex-md-wrap">

    <?php

    $current_view = $TAG;

    $file = "sidebar\\" . users::type() . '.xml';
    $sidebaritems = xml::parse(paths::xml($file));

    foreach ($sidebaritems as $sidebaritem) {
        foreach ($sidebaritem as $item) {
            foreach ($item as $name) {
                $view = $item["tag"];
                $label = $item["label"];
            }
            $lbl = labels::get($label);
            $lnk = $view;

            if ($current_view == $view) { ?>
                <?=
                "<li class='nav-item'>
                    <a class='nav-link active' href='$lnk'>$lbl<span class='sr-only'>(current)</span></a>
                </li>"; ?><?php
            } else { ?>
                <?=
                "<li class='nav-item'>
                    <a class='nav-link' href='$lnk'>$lbl<span class='sr-only'>(current)</span></a>
                </li>"; ?>
                <?php
            }
        }
    }

    ?>

</ul>