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

<script>
    $(document).ready(function () {
        $('#myModal').on('show.bs.modal', function () {
            removeData(this);
        });
    });


    var count = 0;

    function removeData(modal) {
        console.log('Im here');
        $(modal).find('input,textarea').val('');
    }

    // JS
    function onAddCompetence() {
        count++;
        var name = document.getElementById('inputCompName').value;
        var code = document.getElementById('inputCompCode').value;
        var desc = document.getElementById('inputCompDesc').value;
//        var pond = document.getElementById('inputCompPond').value;

        // TODO: clear modal
    }

    function addCompetenceDOM(name, code, description) {
        var competence = $('.template_competence').clone();
        competence.find('.name').val(name);
        $('#form-course').append(competence);
    }
</script>

<?php
load(paths::modal('competence-dialog.php'));
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

<!--                <form class="form" id="form-course" method="Post" action="--><?//= links::get('creating'); ?><!--">-->
                <form class="form" id="form-course" method="Post" action="/create/course-competences">
                    <h2 class="form-heading">
                        <?= labels::get('@PA15'); ?>
                    </h2>

                    <label for="inputEmail" class="sr-only">
                        <?= labels::get('@UI21'); ?>
                    </label>

                    <div class="form-group" type="text">
                        <select class="form-control" id="inputLevel" name="inputLevel">
                            <?php

                            ?>

                            <option><?= labels::get('@UI21'); ?></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>

                    <label for="inputName" class="sr-only">
                        <?= labels::get('@UI22'); ?>
                    </label>

                    <input type="text" id="inputName" name="inputName" class="form-control"
                           placeholder="<?= labels::get('@UI22'); ?>" required="" autofocus="">
                    <div class='spacer-5'></div>

                    <label for="inputCode" class="sr-only">
                        <?= labels::get('@UI23'); ?>
                    </label>

                    <input type="text" id="inputCode" name="inputCode" class="form-control"
                           placeholder="<?= labels::get('@UI23'); ?>" required="">
                    <div class='spacer-10'></div>

                    <button class="btn btn-block" type="button"
                            data-toggle="modal" href="general.php" data-target="#myModal">
                        Add competence
                    </button>

                    <!--                    <input type="hidden" name="bidon" value="10"/>-->

                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        <?= labels::get('@PA14'); ?>
                    </button>
                </form>

            </div>
        </div>
    </div>

    <div class="spacer-30">
    </div>
    <div class="template_competence">
        <div class="name">nom</div>
        <input type="hidden" value="" name="id_name">
        <div class="code">code</div>
        <div class="description">description</div>
    </div>
</div>