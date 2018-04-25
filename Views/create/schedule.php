<?php

use Services\data;
use Services\paths;
use Services\links;
use Services\labels;
use Database\Repositories\days_repository;
use Database\Repositories\periods_repository;
use Database\Repositories\classes_repository;
use Database\Repositories\courses_repository;
use Database\Repositories\courses_instances_repository;

?>

<div class="row container-fluid h-100">
    <nav class="col-sm-3 col-md-2 sidebar d-none d-md-block">
        <?php
        load(paths::part('sidebar.php'), $data);
        ?>
    </nav>

    <div class="col-sm-9 col-md-10 pt-3">
        <div class="schedule">
            <div class="container">

                <form class="form-signin" id="form-signin" method="Post" action="<?= links::get('connecting'); ?>">
                    <h2 class="form-signin-heading">
                        <?= labels::get('@PA09'); ?>
                    </h2>

                    <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            Dropdown button
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Link 1</a>
                            <a class="dropdown-item" href="#">Link 2</a>
                            <a class="dropdown-item" href="#">Link 3</a>
                        </div>
                    </div>

                    <div class='spacer-5'></div>

                    <label for="inputEmail" class="sr-only">
                        <?= labels::get('@UI08'); ?>
                    </label>

                    <input type="text" id="inputUser" name="inputUser" class="form-control"
                           placeholder="<?= labels::get('@UI08'); ?>" required="" autofocus="">

                    <div class='spacer-5'></div>

                    <label for="inputPassword" class="sr-only">
                        <?= labels::get('@UI05'); ?>
                    </label>

                    <input type="password" id="inputPassword" name="inputPassword" class="form-control"
                           placeholder="<?= labels::get('@UI05'); ?>" required="">
                    <div class='spacer-10'></div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        <?= labels::get('@PA14'); ?>
                    </button>
                </form>

            </div>
        </div>
    </div>

    <div class="spacer-30">
    </div>

</div>