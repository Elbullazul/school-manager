<?php

use Services\paths;
use Services\posts;
use Services\links;
use Services\labels;
use Core\ajax_service;

load(paths::part('back-button.php'));
load(paths::modal('trimester-dialog.php'), $data);

?>

<script>
    var count = 0;
    var courses = [];

    function addPlaceholder(object) {
        var container = $('#current_courses');
        var template = $('#template_course').clone();

        var course_text = $('#inputCourseInstances option:selected').text();
        var periods_text = $('#inputPeriods option:selected').text();
        var days_text = $('#inputDays option:selected').text();

        var text = "<b>" + course_text + "</b> on " + days_text + " @ " + periods_text;
        var placeholder = template.clone();
        placeholder.find('.content').html(text);
        placeholder.attr("id", "competence_" + count);
        placeholder.removeClass('d-none');

        container.append(placeholder);
        count++;
    }

    function create() {
        var course_id = $('#inputCourse').val();
        var period_id = $('#inputPeriods').val();
        var day_id = $('#inputDays').val();
        var trimester = $('#inputTrimester').val();
        var teacher_id = $('#inputTeacher').val();
        var class_id = $('#inputClass').val();

        var course = {
            course_id: course_id,
            period_id: period_id,
            day_id: day_id,
            trimester_id: trimester,
            teacher_id: teacher_id,
            class_id: class_id
        };

        courses.push(course);
        addPlaceholder(course);
        $('#inputInstances').val(JSON.stringify(courses));

        $.notify({
            message: 'Ajouté à la liste d\'attente'
        }, {
            type: 'info'
        });

        $('#form-schedule').find("select").prop('selectedIndex', 0);
    }
</script>

<div class="row container-fluid h-100">
    <div class="col-md-3"></div>
    <div class="col-md-6 pt-3">
        <div class="container">

            <form id="form-schedule" method="Post"
                  action="<?= links::get('create-write-new-schedule-courses'); ?>">
                <h2 class="form-signin-heading">
                    <?= labels::get('@PA09'); ?>
                </h2>
                <div class="spacer-10"></div>

                <select class="form-control" id="inputCourse" name="inputCourse">
                    <option selected disabled>Select a course</option>
                    <?php
                    foreach ($COURSES as $course) { ?>
                        <option value="<?= $course->getId(); ?>"><?= $course->getName(); ?></option>
                    <?php }
                    ?>
                </select>
                <div class="spacer-5"></div>

                <select class="form-control" id="inputPeriods" name="inputPeriods">
                    <option selected disabled>Select a period</option>
                    <?php
                    foreach ($PERIODS as $period) { ?>
                        <option value="<?= $period->getId(); ?>"><?= $period->genTag(); ?></option>
                    <?php }
                    ?>
                </select>
                <div class="spacer-5"></div>

                <select class="form-control" id="inputDays" name="inputDays">
                    <option selected disabled>Select day</option>
                    <?php
                    foreach ($DAYS as $day) { ?>
                        <option value="<?= $day->getId(); ?>"><?= $day->getName(); ?></option>
                    <?php }
                    ?>
                </select>
                <div class="spacer-5"></div>

                <select class="form-control" id="inputTeacher" name="inputTeacher">
                    <option selected disabled>Select teacher</option>
                    <?php
                    foreach ($TEACHERS as $teacher) { ?>
                        <option value="<?= $teacher->getId(); ?>"><?= $teacher->getFirstName() . ' ' . $teacher->getLastName(); ?></option>
                    <?php }
                    ?>
                </select>
                <div class="spacer-5"></div>

                <select class="form-control" id="inputClass" name="inputClass">
                    <option selected disabled>Select class</option>
                    <?php
                    foreach ($CLASSES as $class) { ?>
                        <option value="<?= $class->getId(); ?>"><?= $class->getCode(); ?></option>
                    <?php }
                    ?>
                </select>
                <div class="spacer-5"></div>

                <div id="current_courses">
                    <div id="template_course" class="template_competence d-none container-fluid form-control">
                        <p class="content col-md-10 border-0"></p>
                    </div>
                </div>
                <div class='spacer-10'></div>

                <button type="button" class="btn btn-secondary btn-block" onclick="create()">
                    Ajouter à l'horaire
                </button>
                <div class='spacer-10'></div>

                <input id="inputInstances" name="inputInstances" class="d-none">
                <input id="inputTrimester" name="inputTrimester" class="d-none"
                       value="<?= posts::get('inputTrimester'); ?>">

                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Terminer
                </button>
            </form>

        </div>
    </div>
</div>

<div class="spacer-30">
</div>