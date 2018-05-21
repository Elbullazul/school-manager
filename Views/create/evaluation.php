<?php

use Services\paths;
use Services\links;
use Services\labels;
use Core\ajax_service;

load(paths::part('back-button.php'));

?>

<script>
    var count = 1;

    function onToggleButton(button) {

        var button = $(button);
        var divId = $(button.parent()).parent().attr('id');
        var competence_id = divId.replace('competence_', '');
        var competenceInput = $('#inputCompetences');

        if (button.hasClass('btn-success')) {
            button.removeClass('btn-success');
            button.addClass('btn-danger');

            // add to input
            var comps = competenceInput.attr('value');
            if (comps != "") {
                values = comps + ',' + competence_id;
            }
            else {
                values = competence_id;
            }

            competenceInput.attr('value', values);

            button.text('×');
        } else {
            button.removeClass('btn-danger');
            button.addClass('btn-success');

            // remove from input
            var comps = competenceInput.attr('value');

            if (comps.indexOf(competence_id) !== -1) {
                values = comps.replace(competence_id + ',', ''); // if any index
                values = values.replace(',' + competence_id, ''); // if last index
                values = values.replace(competence_id, '');  // if only index
            } else {
                values = '';
            }

            competenceInput.attr('value', values);

            button.text('+');
        }
    }

    $(document).ready(function () {
        $('.btn-toggle').on('click', function () {
            onToggleButton(this);
        });
    });

    function loadCompetences() {
        var table = $('#table-competences');
        var template = $('#template_competence').clone(true, true);
        var course_instance_id = $('#inputCourseInstances').val();

        $.ajax({
            type: 'post',
            url: "<?= ajax_service::get_action_url('load-course-competences'); ?>",
            data: {
                instance_id: course_instance_id
            },
            success: function (result) {
                var competences = JSON.parse(result);

                table.empty();

                $.each(competences, function (index, competence) {
                    var placeholder = template.clone();
                    placeholder.find('.content').html('(' + competence['code'] +
                        ') ' + competence['name'] + '</br><small>' + competence['description'] + '</small>');
                    placeholder.attr("id", "competence_" + competence['id']);
                    placeholder.removeClass('d-none');

                    table.append(placeholder);
                    count++;
                });

                $('.btn-toggle').on('click', function () {
                    onToggleButton(this);
                });
            },
            error: function (result) {
                $.notify({
                    message: 'Error occurred'
                }, {
                    type: 'danger'
                });
            }
        });
    }
</script>
<div class="row container-fluid h-100">
    <div class="col-md-3"></div>
    <div class="col-md-6 pt-3">
        <div class="container">

            <form class="form-signin" id="form-signin" method="Post"
                  action="<?= links::get('create-write-new-evaluation'); ?>">
                <h2 class="form-signin-heading">
                    <?= labels::get('@UI49'); ?>
                </h2>
                <div class="spacer-10"></div>

                <select class="form-control" id="inputCourseInstances" name="inputCourseInstances"
                        onchange="loadCompetences()">
                    <option selected disabled>Select a course</option>
                    <?php
                    foreach ($COURSES as $course) { ?>
                        <option value="<?= $course->getId(); ?>"><?= $course->getCourse()->getName() . ' (' . $course->getDay()->getName(). ' ' . $course->getPeriod()->genTag() . ')'; ?></option>
                    <?php }
                    ?>
                </select>
                <div class="spacer-5"></div>

                <input type="text" id="inputName" name="inputName" class="form-control" placeholder="Nom de l'examen">
                <div class="spacer-5"></div>

                <label>Points de note</label>
                <input type="number" id="inputPoints" name="inputPoints" class="form-control" value="0">
                <div class="spacer-5"></div>

                <label>Pondération de l'examen</label>
                <input type="number" id="inputPonderation" name="inputPonderation" class="form-control" value="0">
                <div class="spacer-5"></div>

                <textarea name="inputDescription" id="inputDescription" placeholder="Description" class="form-control">
                </textarea>
                <div class="spacer-5"></div>

                <?php
                $text = 'L\'évaluation est finale';
                $params = ['LABEL' => $text, 'ID' => 'is_final', 'NAME' => 'is_final', 'CHECKED' => false];
                load(paths::part('checkbutton.php'), $params, false);
                ?>
                <div class="spacer-5"></div>

                <?php
                $text = 'L\'évaluation possède une pondération globale';
                $params = ['LABEL' => $text, 'ID' => 'is_global_ponderation', 'NAME' => 'is_global_ponderation', 'CHECKED' => false];
                load(paths::part('checkbutton.php'), $params, false);
                ?>
                <div class="spacer-5"></div>

                <table>
                    <tr id="template_competence" class="template_competence d-none container-fluid form-control">
                        <th class="content col-md-10 border-0"></th>
                        <th class="pr-0 border-0">
                            <button type="button" class="btn btn-success btn-toggle">+
                            </button>
                        </th>
                    </tr>
                    <table id="table-competences" class="table">
                    </table>
                </table>
                <div class="spacer-5"></div>

                <input type="text" id="inputCompetences" name="inputCompetences" value="" class="d-none">

                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Suivant
                </button>
            </form>

        </div>
    </div>
</div>

<div class="spacer-30">
</div>