<?php

use Services\users;
use Services\labels;
use Services\links;
use Services\paths;
use Services\xml;

?>

<div class="dropdown-toggle noselect" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-user"></i>
</div>
<div class="dropdown-menu dropdown-menu-right text-left">
    <?php

    // TODO: load menu file
    $file = "user-menu\\" . users::type() . '.xml';
    $menuitems = xml::parse(paths::xml($file));

    foreach ($menuitems as $menuitem) {
        foreach ($menuitem as $item) {
            foreach ($item as $name) {
                $view = $item["tag"];
                $label = $item["label"];
            }
            echo '<a class="dropdown-item" href="' . links::get($view) . '">' . labels::get($label) . '</a>';
        }
    }

    ?>
</div>
