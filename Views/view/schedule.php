<?php

use Services\data;
use Services\paths;
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
            <?php

            $repo = new courses_instances_repository();
            $courses = $repo->find_current('2017-2018 T1');

            if (!is_array($courses))
                $courses = array($courses);

            // load days and periods
            $repo = new days_repository();
            $days = $repo->fetch_all();

            $repo = new periods_repository();
            $periods = $repo->fetch_all();

            // TODO: load content and display

            foreach ($periods as $period) {
                echo '<div class="row">';

                $begins = $period->getBegins();
                $begins = substr($begins, 0, strlen($begins) - 3);

                $ends = $period->getEnds();
                $ends = substr($ends, 0, strlen($ends) - 3);

                echo "<div class='col-md-2 period'>$begins - $ends</div>";

                foreach ($days as $day) {

                    $html = "<div class='col-md-2 course empty'></div>";

                    // get day courses
                    $entities = data::find_entities('getDayId', $day->getId(), $courses);

                    if (!is_null($entities)) {
                        $entity = data::find_entity('getPeriodId', $period->getId(), $entities);
                        if (!is_null($entity)) {
                            $html = '<div class="col-md-2 text-center course">';

                            // find course data
                            $repo = new courses_repository();
                            $course_data = $repo->find('id', $entity->getCourseId());

                            $html = $html . '<b>' . $course_data->getName() . '</b>';
                            $html = $html . '<p class="mb-0">' . $course_data->getCode() . '</p></br>';

                            $repo = new classes_repository();
                            $class = $repo->find('id', $entity->getClassId());

                            $html = $html . '<p class="mb-0">' . labels::get('@UI20') . ': ' . $class->getCode() . '</p>';
                            $html = $html . '</div>';
                        }
                    }
                    echo $html;
                }

                echo '</div>';
            } ?>
        </div>
    </div>

    <div class="spacer-30">
    </div>

</div>