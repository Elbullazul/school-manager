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

load(paths::part('back-button.php'));
load(paths::modal('trimester-dialog.php'), $data);

?>

<script>
    $(document).ready(function() {
        $('#form-new-schedule').validate({
            rules: {
                inputTrimester: {
                    requireD: true
                }
            }
        });
    });
</script>

<div class="row container-fluid h-100">
    <div class="col-md-3"></div>
    <div class="col-md-6 pt-3">
        <div class="container">

            <form class="form" id="form-new-schedule" method="Post" action="<?= links::get('create-schedule-courses'); ?>">
                <h2 class="form-signin-heading">
                    <?= labels::get('@PA09'); ?>
                </h2>
                <div class="spacer-10"></div>

                <select class="form-control" id="inputTrimester" name="inputTrimester">
                    <option disabled selected>Select trimester</option>
                    <?php
                    foreach ($TRIMESTERS as $trimester) { ?>
                        <option value="<?= $trimester->getId(); ?>"><?= $trimester->getName(); ?></option>
                        <?php
                    }
                    ?>
                </select>
                <div class="spacer-5"></div>
                <button type="button" class="btn btn-secondary btn-block"  data-toggle="modal" data-target="#modal_trimester">
                    Create new trimester
                </button>
                <div class='spacer-10'></div>

                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Suivant
                </button>
            </form>

        </div>
    </div>
</div>

<div class="spacer-30">
</div>

</div>