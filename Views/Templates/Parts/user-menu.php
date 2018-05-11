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

    $file = "user-menu\\" . users::type() . '.xml';
    $menuitems = xml::parse(paths::xml($file));

    foreach ($menuitems['menuitem'] as $item) {
        $view = $item["tag"];
        $label = $item["label"];

        echo '<a class="dropdown-item" href="' . $view . '">' . labels::get($label) . '</a>';
    }

    ?>
</div>
