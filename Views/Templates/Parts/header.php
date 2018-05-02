<?php

use Services\paths;
use Services\labels;
use Services\users;

?>

<div class='navbar navbar-default'>
    <!-- Mobile menu -->
    <div class="dropdown-toggle mobile-menu-toggle d-md-none noselect" data-toggle="dropdown" aria-haspopup="true"
         aria-expanded="false">
        <i class="fas fa-bars"></i>
    </div>
    <?php load(paths::part('mobile-menu.php')); ?>
    <div class="logo">
        <img src="<?= paths::resource('img/logo.png'); ?>" height="24px"/>
        <?= labels::get('@UI01'); ?>
    </div>
    <div class="btn-group">
        <!-- TODO: Load the menu if connected -->
        <?php
        if (users::connected())
            load(paths::part('user-menu.php'));
        ?>
    </div>
</div>
