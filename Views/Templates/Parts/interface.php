<?php

use Services\paths;

?>

<div class="row container-fluid h-100 p-0 m-0">
    <nav class="col-sm-3 col-md-2 sidebar d-none d-md-block">
        <?php
        load(paths::part('sidebar.php'), $data);
        ?>
    </nav>

    <div class="col-sm-9 col-md-10 p-3">
        <div class="row container p-0 m-0">
            <?php
            load(paths::part('grid.php'), $data);
            ?>
        </div>
    </div>
</div>

<!--<div class="d-none d-md-block">Show on large screen only works now</div>-->
<!--<div class="d-md-none">Show on small screen only</div>-->
