<?php

use Services\paths;
use Services\labels;

?>

<script>
    function printSchedule() {
        window.print();
    }
</script>
<!-- Print in landscape mode -->
<style>
    @media print {
        @page {
            size: landscape
        }
    }
</style>

<?php
load(paths::part('back-button.php'));
?>

<div class="row container-fluid h-100">
    <div class="schedule col-md-12 m-3 ">
        <?php

        $days = $data['DAYS'];
        $periods = $data['PERIODS'];
        $schedule = $data['SCHEDULE'];
        $trimester = $data['TRIMESTER'];

        // TODO: Fixed cell size for mobile
        ?>
        <h1><?= labels::get('@UI15') . ' ' . $trimester->getName(); ?></h1>
        <table id="schedule" class="table table-bordered table-responsive-md table-fixed">
            <tr class="table-light">
                <th></th>   <!-- Empty cell between columns & rows -->
                <?php
                foreach ($days as $day) { ?>
                    <th><?= $day->getName(); ?></th>
                    <?php
                }
                ?>
            </tr>
            <?php
            foreach ($periods as $period) { ?>
                <tr class="table-light container-fluid">
                    <td><?= $period->genTag(); ?></td>
                    <?php
                    foreach ($days as $day) {
                        if (isset($schedule[$day->getId()][$period->getId()])) {
                            $course_instance = $schedule[$day->getId()][$period->getId()];
                            ?>
                            <td align="center" class="active-cell cell text-center">
                                <small>
                                    <b><?= '(' . $course_instance->getCourse()->getCode() . ')'; ?></b>
                                    <?= $course_instance->getCourse()->getName(); ?>
                                    <br>
                                    <br>
                                    <?= labels::get('@UI20') . ' ' . $course_instance->getClass()->getCode(); ?>
                                </small>
                            </td>
                            <?php
                        } else { ?>
                            <td class="cell">
                                <br>
                                <br>
                                <br>
                                <br>
                            </td>
                            <?php
                        }
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
        </table>
        <div class="spacer-10"></div>
    </div>
    <?php
    load(paths::part('print-button.php'));
    ?>
    <div class="spacer-30">
    </div>
</div>