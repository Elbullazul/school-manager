<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-25
 * Time: 14:41
 */

use Services\paths;
use Services\labels;
use Services\links;

$level = $data['LEVEL'];
$course = $data['COURSE'];
$competences = $data['COMPETENCES'];
$competences_count = count($competences);

?>

<script>
    // Modal
    $(document).ready(function () {
        $('#myModal').on('show.bs.modal', function () {
            removeData(this);
        });

        $('.btn-toggle').on('click', function () {
            var button = $(this);
            var divId = $(button.parent()).parent().attr('id');
            var competence_id = divId.replace('competence_', '');
            var competenceInput = $('#competences');
            console.log(competence_id);

            if (button.hasClass('btn-success')) {
                button.removeClass('btn-success');
                button.addClass('btn-danger');

                // add to input
                var comps = competenceInput.attr('value');
                if (comps != "") {
                    values = JSON.parse(comps);
                    values.push(competence_id);
                    values = JSON.stringify(values);
                }
                else {
                    values = JSON.stringify([competence_id]);
                }

                competenceInput.attr('value', values);

                button.text('×');
            } else {
                button.removeClass('btn-danger');
                button.addClass('btn-success');

                // remove from input
                var comps = competenceInput.attr('value');

                var index = comps.indexOf(competence_id);
                if (index > -1) {
                    values = JSON.parse(comps);
                    values = values.splice(index, 1);
                    values = JSON.stringify(values);
                } else {
                    values = '';
                }

                competenceInput.attr('value', values);

                button.text('+');
            }
//            console.log($($this.parent()).parent().attr('id'));
        });
    });

    function save() {
        console.log('Sending data to server...');

        count++;
        var name = document.getElementById('inputCompName').value;
        var code = document.getElementById('inputCompCode').value;
        var desc = document.getElementById('inputCompDesc').value;
        var pond1 = document.getElementById('inputComp1Pond').value;
        var pond2 = document.getElementById('inputComp2Pond').value;
        var pond3 = document.getElementById('inputComp3Pond').value;

        $.ajax({
            type: 'POST',
            url: "<?= '/ajax/save_competence'; ?>", // TODO: Include in links eventually
            data: {
                name: name,
                code: code,
                desc: desc,
                pond_t1: pond1,
                pond_t2: pond2,
                pond_t3: pond3
            },
            success: function (result) {
//                $("#messages").html(result);
                $.notify({
                        message: result
                    }, {
                        type: 'success'
                    }
                );
                addCompetenceDOM(name, code, desc);
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                console.log('Error ocurred');
            }
        });
    };

    function removeData(modal) {
        $(modal).find('input,textarea').val('');
    }

    // Page insertion
    var count = <?= $competences_count; ?>;    // TODO: competence count

    function addCompetenceDOM(name, code, description) {
        var competence = $('#template_competence').clone(true, true);

        competence.find('.content').html('(' + code + ') ' + name + '</br><small>' + description + '</small>');
        competence.attr("id", "competence_" + count);

        var element = document.getElementById('inputCompetences');
        competence.removeClass('d-none');

        $('#form-competences').append(competence);
    }

</script>

<?php
load(paths::modal('competence-dialog.php'));
?>

<?php
load(paths::part('back-button.php'));
?>

<div class="row container-fluid h-100">
    <div class="col-md-3"></div>
    <div class="col-md-6 pt-3">
        <div>
            <div class="course-condensed">
                <?php
                echo '<h5>' . labels::get('@UI37') . '</h5>';
                echo '<small class="mb-0"><b>' . labels::get('@UI27') . '</b>: ' . $course['name'] . '</small></br>';
                echo '<small class="mb-0"><b>' . labels::get('@UI28') . '</b>: ' . $course['code'] . '</small></br>';
                echo '<small class="mb-0"><b>' . labels::get('@UI21') . '</b>: ' . $level . '</small>';

                ?>
            </div>
            <div class="spacer-15"></div>
            <form class="form" method="Post" action="<?= links::get('create-write'); ?>">
                <div class="container">
                    <h2>
                        <?= "Ajouter des compétences"; ?>
                    </h2>
                    <div id="messages"></div>
                </div>
                <table id="form-competences" class="table">
                    <tr id="template_competence" class="template_competence d-none container-fluid form-control">
                        <th class="content col-md-10 border-0"></th>
                        <th class="pr-0 border-0">
                            <button class="btn btn-success btn-toggle">+</button>
                        </th>
                    </tr>
                    <?php

                    foreach ($competences as $index => $competence) {
                        echo '<tr id="competence_' . $index . '" class="template_competence container-fluid form-control">';
                        echo '<th class="content col-md-10 border-0">';

                        echo '(' . $competence['code'] . ') ' . $competence['name'];
                        echo '</br><small>' . $competence['description'] . '</small>';

                        echo '</th>';
                        echo '<th class="pr-0 border-0">';
                        echo '<button type="button" class="btn btn-success btn-toggle">+</button>';
                        echo '</th>';
                        echo '</tr>';
                    }

                    ?>
                </table>
                <input type="hidden" value="[]" id="competences" name="competences[]" required="">
                <button type="button" class="btn btn-block" type="button"
                        data-toggle="modal" data-target="#myModal">
                    <?= labels::get('@UI39'); ?>
                </button>
                <div class='spacer-10'></div>
                <button class="btn btn-primary btn-block btn-lg" type="submit">
                    <?= labels::get('@UI40'); ?>
                </button>

            </form>
            <div class="spacer-10"></div>
        </div>
    </div>
</div>
