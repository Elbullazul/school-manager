<?php

use Services\data;
use Services\paths;
use Services\labels;

?>

<script>
    function printSchedule() {
        window.print();
    }
</script>

<?php
load(paths::part('back-button.php'));
?>

<div class="row container-fluid h-100">
    <div class="schedule col-md-12 m-3 ">
        <?php

        $days = $data['DAYS'];
        $periods = $data['PERIODS'];
        $courses = $data['COURSES'];
        $trimester = $data['TRIMESTER'];

        // TODO: load content and display

        echo '<h1>' . labels::get('@UI15') . ' ' . $trimester['id'] . '</h1>';

        // display day names
        echo '<div class="row"><div class="col-md-2"></div>';   // empty period column
        foreach ($days as $day) {
            $name = $day['name'];

            echo '<div class="col-md-2 day">' . $name . '</div>';
        }

        echo '</div>';

        foreach ($periods as $period_id => $period) {
            echo '<div class="row">';

            $begins = $period['begins'];
            $ends = $period['ends'];

            echo "<div class='col-md-2 period'>$begins - $ends</div>";

            foreach ($days as $day_id => $day) {
                $current = data::get_course($day_id, $period_id, $courses);

                if (!is_null($current)) {
                    echo '<div class="col-md-2 text-center course">';
                    echo '<b>' . $current['name'] . '</b>';
                    echo '<p class="mb-0">' . $current['code'] . '</p></br>';
                    echo '<p class="mb-0">' . labels::get('@UI20') . ': ' . $current['class'] . '</p>';
                    echo '</div>';
                } else {
                    echo "<div class='col-md-2 course empty'></div>";
                }
            }

            echo '</div>';
        } ?>
    </div>
    <div class="spacer-10"></div>

</div>
<?php
load(paths::part('print-button.php'));
?>
<div class="spacer-30">
</div>

<!--</div>-->