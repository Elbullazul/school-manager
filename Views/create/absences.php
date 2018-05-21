<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-08
 * Time: 12:30
 */

use Services\date;
use Services\users;
use Services\paths;
use Services\links;
use Services\labels;
use Core\ajax_service;

?>

<script>

    $(document).ready(function () {
        $('#form-absences').validate({
            rules: {
                inputCourseInstancesId: {
                    required: true
                },
                inputStudent: {
                    required: true
                },
                inputDate: {
                    required: true,
                    maxDate: true,
                    minDate: true
                },
                inputAbsenceDuration: {
                    required: true
                },
                inputComment: {
                    required: true
                }
            }

        });
    });

    $.validator.addMethod("maxDate", function(value, element) {
        var curDate = new Date('<?= $TRIMESTER->getEnds();?>');
        var inputDate = new Date(value);

        if (inputDate < curDate)
            return true;
        return false;
    }, "Invalid Date!");

    $.validator.addMethod("minDate", function(value, element) {
        var curDate = new Date('<?= $TRIMESTER->getBegins();?>');
        var inputDate = new Date(value);
        if (inputDate > curDate)
            return true;
        return false;
    }, "Invalid Date!");

    function show_students() {
        course_id = $('#select-course').val();

        $.ajax({
            type: "post",
            url: "<?= ajax_service::get_action_url('get-students-by-course'); ?>",
            data: {
                course_instance_id: course_id
            },
            success: function (result) {
                $('#select-student').find('option').remove().end();

                students = JSON.parse(result);

                $.each(students, function (index, value) {
                    $('#select-student').append($('<option>', {
                        value: value['id'],
                        text: value['last_name'] + ', ' + value['first_name']
                    }));
                });

                $('#select-student').removeClass('d-none');
                $('#select-student-spacer').removeClass('d-none');
            },
            error: function (xhr, status, error) {
                $.notify({
                    message: "<?= labels::get('@SYS05'); ?>"
                }, {
                    type: 'danger'
                });
            }
        });
    }
</script>

<?php load(paths::part('back-button.php')); ?>
<div class="row container-fluid h-100">
    <div class="col-md-3"></div>
    <div class="col-md-6 pt-3">
        <div class="container">

            <form id="form-absences" method="post" action="<?= links::get('create-write-new-absence'); ?>">
                <h1 id="title">Register absency</h1>
                <div class="spacer-15"></div>

                <!--                TODO: Use JQuery for valiadtion-->
                <select type="text" id="select-course" name="inputCourseInstanceId" autofocus="" class="form-control"
                        required=""
                        onchange="show_students()">
                    <option selected disabled>Choose course</option>
                    <?php
                    foreach ($COURSES as $course_instance) { ?>
                        <option value="<?= $course_instance->getId(); ?>"><?= $course_instance->getCourse()->getName() . ' (' . $course_instance->getDay()->getName() . ' ' . $course_instance->getPeriod()->genTag() . ')'; ?></option>
                        <?php
                    }
                    ?>
                </select>
                <div class="spacer-15"></div>

                <select id="select-student" class="form-control d-none" required="" name="inputStudent">
                    <option selected disabled>Select absent student</option>
                </select>
                <div id="select-student-spacer" class="spacer-15 d-none"></div>

                <?php // send current user data; ?>
                <input class="form-control d-none" required="" value="<?= users::username(); ?>"
                       name="inputAbsencySubmitter"/>

                <label>Date of absency</label>
                <input type="date" class="form-control" value="<?= date::now(); ?>" id="absence-date" name="inputDate"
                       required="">
                <div class="spacer-15"></div>

                <label>Length of absency</label>
                <input type="time" value="01:00" id="absence-duration" name="inputAbsenceDuration"
                       class="form-control"
                       placeholder="Time absent (in hours)"
                       required="">
                <div class="spacer-15"></div>

                <textarea class="form-control" placeholder="Comment" required="" name="inputComment"></textarea>
                <div class="spacer-15"></div>

                <button class="btn btn-block btn-primary" type="submit">Save</button>
            </form>
            <div class="spacer-15"></div>
        </div>
    </div>
</div>
