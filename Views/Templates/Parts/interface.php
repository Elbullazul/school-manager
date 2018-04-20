<?php

use Services\paths;

?>

<div class="row container-fluid h-100">
    <nav class="col-sm-3 col-md-2 sidebar d-none d-md-block">
        <?php
        load(paths::part('sidebar.php'));
        ?>
    </nav>

    <div class="col-sm-9 col-md-10 pt-3">
        <div class="row container">
            <?php
            load(paths::part('grid.php'));
            ?>
        </div>
        <div class="spacer-30">
        </div>

    </div>
</div>

<!--<div class="d-none d-md-block">Show on large screen only works now</div>-->
<!--<div class="d-md-none">Show on small screen only</div>-->
