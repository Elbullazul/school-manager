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
use Core\ajax_service;

$level = $data['LEVEL'];
$course = $data['COURSE'];
$competences = $data['COMPETENCES'];
$competences_count = count($competences);

// TODO: Include JS file instead
?>

<script>
    var count = <?= $competences_count; ?>;

    // Modal
    $(document).ready(function () {
        $('#competence-form').validate({
            rules: {
                inputCompName: {
                    required: true
                },
                inputCompCode: {
                    required: true
                },
                inputCompDesc: {
                    required: true
                },
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
                inputCompName: {
                    required: "<?= labels::get('@UI43'); ?>"
                },
                inputCompCode: {
                    required: "<?= labels::get('@UI43'); ?>"
                },
                inputCompDesc: {
                    required: "<?= labels::get('@UI43'); ?>"
                },
                inputComp1Pond: {
                    required: "<?= labels::get('@UI43'); ?>",
                    min: "<?= labels::get('@UI44'); ?>",
                    max: "<?= labels::get('@UI45'); ?>"
                },
                inputComp2Pond: {
                    required: "<?= labels::get('@UI43'); ?>",
                    min: "<?= labels::get('@UI44'); ?>",
                    max: "<?= labels::get('@UI45'); ?>"
                },
                inputComp3Pond: {
                    required: "<?= labels::get('@UI43'); ?>",
                    min: "<?= labels::get('@UI44'); ?>",
                    max: "<?= labels::get('@UI45'); ?>"
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
                    url: "<?= ajax_service::get_action_url('save-competence'); ?>",
                    data: {
                        name: name,
                        code: code,
                        description: desc,
                        ponderations: [pondt1, pondt2, pondt3]
                    },
                    success: function (result) {
                        $.notify({
                                message: result
                            }, {
                                type: 'success'
                            }
                        );
                        addCompetenceDOM(name, code, desc);
                    },
                    error: function (xhr, status, error) {
                        $.notify({
                            message: "<?= labels::get('@SYS05'); ?>"
                        }, {
                            type: 'danger'
                        });
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
<div class="row container-fluid h-100">
    <div class="col-md-3"></div>
    <div class="col-md-6 pt-3">
        <div>
            <div class="course-condensed">
                <h5><?= labels::get('@UI37'); ?></h5>
                <small class="mb-0 form-control-static">
                    <b><?= labels::get('@UI27'); ?></b><?= ': ' . $course->getName(); ?>
                </small>
                </br>
                <small class="mb-0 form-control-static">
                    <b><?= labels::get('@UI28'); ?></b><?= ': ' . $course->getCode(); ?>
                </small>
                </br>
                <small class="mb-0 form-control-static">
                    <b><?= labels::get('@UI21'); ?></b><?= ': ' . $level; ?>
                </small>
            </div>
            <div class="spacer-15"></div>
            <form class="form" id="competence_form" method="Post" action="<?= links::get('create-write-new-course'); ?>">
                <div class="container">
                    <h2>
                        <?= "Ajouter des compétences"; ?>
                    </h2>
                </div>
                <div class="viewport mb-2">
                    <table id="table-competences" class="table">
                        <tr id="template_competence" class="template_competence d-none container-fluid form-control">
                            <th class="content col-md-10 border-0"></th>
                            <th class="pr-0 border-0">
                                <button type="button" class="btn btn-success btn-toggle">+</button>
                            </th>
                        </tr>
                        <?php

                        foreach ($competences as $competence) { ?>
                            <tr id="competence_<?= $competence->getId(); ?>" class="template_competence container-fluid form-control">
                                <th class="content col-md-10 border-0">

                                    <?= '(' . $competence->getCode() . ') ' . $competence->getName(); ?>
                                    </br>
                                    <small><?= $competence->getDescription(); ?></small>
                                </th>
                                <th class="pr-0 border-0">
                                    <button type="button" class="btn btn-success btn-toggle">+</button>
                                </th>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
                <input type="hidden" value="<?= $course->getName(); ?>" id="inputName" name="course[name]" required="">
                <input type="hidden" value="<?= $course->getCode(); ?>" id="inputCode" name="course[code]" required="">
                <input type="hidden" value="<?= $course->getLevel(); ?>" id="inputLevel" name="course[level]" required="">
                <input type="hidden" value="" id="competences" name="competences" required="">
                <button type="button" class="btn btn-block" data-toggle="modal" data-target="#competence-modal">
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
