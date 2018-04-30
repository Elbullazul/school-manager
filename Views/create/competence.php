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
    // Page insertion
    var count = <?= $competences_count; ?>;    // TODO: competence count

    // Modal
    $(document).ready(function () {
        $('#competence-form').validate({
            rules: {
                inputComp1Pond: {
                    required: true,
                    min: 0,
                    max: 100,
                    number: true
                },
                inputComp2Pond: {
                    required: true,
                    min: 0,
                    max: 100
                },
                inputComp3Pond: {
                    required: true,
                    min: 0,
                    max: 100
                }
            },
            messages: {
                inputComp1Pond: {
                    required: "Cancel your subscription!",
                    min: "Must be higher or equal to zero",
                    max: "Must be lower or equal to 100"
                },
                inputComp2Pond: {
                    required: "Cancel your subscription!",
                    min: "Must be higher or equal to zero",
                    max: "Must be lower or equal to 100"
                },
                inputComp3Pond: {
                    required: "Cancel your subscription!",
                    min: "Must be higher or equal to zero",
                    max: "Must be lower or equal to 100"
                }
            },
            highlight: function (element) {
                $(element).closest('.control-group')
                    .removeClass('success').addClass('danger');
            },
            success: function (element) {
                element.addClass('valid').closest('.control-group')
                    .removeClass('danger').addClass('success');
                // remove label
                element.remove();
            },
            submitHandler: function (form) {
                count++;
                var name = $('#inputCompName').val();
                var code = $('#inputCompCode').val();
                var desc = $('#inputCompDesc').val();
                var pondt1 = $('#inputComp1Pond').val();
                var pondt2 = $('#inputComp2Pond').val();
                var pondt3 = $('#inputComp3Pond').val();

                $.ajax({
                    type: $(form).attr('method'),
                    url: "<?= '/ajax/save_competence'; ?>", // TODO: Include in links eventually
                    data: {
                        name: name,
                        code: code,
                        description: desc,
                        ponderations: [pondt1, pondt2, pondt3]
                    },
                    success: function (result) {
                        // DEBUG
                        $("#messages").html(result);
                        console.log('Saved data successfully');
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

                $('#competence-modal').modal('hide');
            }
        });

        $('#competence-modal').on('show.bs.modal', function () {
            removeData(this);
        });

        $('.btn-toggle').on('click', function () {
            var button = $(this);
            var divId = $(button.parent()).parent().attr('id');
            var competence_id = divId.replace('competence_', '');
            var competenceInput = $('#competences');

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
//            console.log($($this.parent()).parent().attr('id'));
        });
    });

    function removeData(modal) {
        $(modal).find('input,textarea').val('');
    }

    function addCompetenceDOM(name, code, description) {
        var competence = $('#template_competence').clone(true, true);

        competence.find('.content').html('(' + code + ') ' + name + '</br><small>' + description + '</small>');
        competence.attr("id", "competence_" + count);

        var element = document.getElementById('inputCompetences');
        competence.removeClass('d-none');

        $('#table-competences').append(competence);
    }

</script>

<?php
load(paths::modal('competence-dialog.php'));
?>

<?php
load(paths::part('back-button.php'));
?>
<a href="">text</a>
<div class="row container-fluid h-100">
    <div class="col-md-3"></div>
    <div class="col-md-6 pt-3">
        <div>
            <div class="course-condensed">
                <?php
                echo '<h5>' . labels::get('@UI37') . '</h5>';
                echo '<small class="mb-0 form-control-static"><b>' . labels::get('@UI27') . '</b>: ' . $course['name'] . '</small></br>';
                echo '<small class="mb-0 form-control-static"><b>' . labels::get('@UI28') . '</b>: ' . $course['code'] . '</small></br>';
                echo '<small class="mb-0 form-control-static"><b>' . labels::get('@UI21') . '</b>: ' . $level . '</small>';

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
                <table id="table-competences" class="table">
                    <tr id="template_competence" class="template_competence d-none container-fluid form-control">
                        <th class="content col-md-10 border-0"></th>
                        <th class="pr-0 border-0">
                            <button type="button" class="btn btn-success btn-toggle">+</button>
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
                <input type="hidden" value="<?= $course['name']; ?>" id="inputName" name="course[name]" required="">
                <input type="hidden" value="<?= $course['code']; ?>" id="inputCode" name="course[code]" required="">
                <input type="hidden" value="<?= $course['level']; ?>" id="inputLevel" name="course[level]" required="">
                <input type="hidden" value="" id="competences" name="competences" required="">
                <button type="button" class="btn btn-block" type="button"
                        data-toggle="modal" data-target="#competence-modal">
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
