<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-20
 * Time: 11:44
 */

load(\Services\paths::part('back-button.php'));

?>

<div class="row container-fluid h-100">
    <div class="schedule col-md-12 m-3 ">
        <?php
        foreach ($ABSENCES as $absence) {
            $student = $absence->getStudentId();
            $course = $absence->getCourseInstanceId(); ?>
            <div class="container template_competence">
                <b><?= $student->getFirstName() . ' ' . $student->getLastName(); ?></b>
                <p><?= $course->getCourse()->getName(); ?></p>
                <p>Temps Absent: <?= $absence->getTimeAbsent(); ?></p>
                <p>Le: <?= $absence->getDate(); ?></p>
            </div>
            <?php
        }
        ?>
    </div>
</div>