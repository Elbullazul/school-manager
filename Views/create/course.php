<?php

use Services\links;
use Services\paths;
use Services\labels;
use Core\ajax_service;

load(paths::part('back-button.php'));

?>

<script>
    function setLevelName() {
        var levelDiv = document.getElementById('inputLevel');
        var levelNameDiv = document.getElementById('inputLevelName');

        levelNameDiv.value = levelDiv.options[levelDiv.selectedIndex].text;
    }

    $(document).ready(function () {
        $('#form-course').validate({
            rules: {
                inputLevel: {
                    required: true
                },
                inputName: {
                    required: true
                },
                inputCode: {
                    required: true,
                    remote: {
                        type: $('#form-course').attr('method'),
                        url: "<?= ajax_service::get_action_url('validate-course-code'); ?>",
                        data: {
                            course_code: function () {
                                return $('#inputCode').val();
                            }
                        }
                    }
                }
            },
            messages: {
                inputLevel: {
                    required: "<?= labels::get('@UI43'); ?>"
                },
                inputName: {
                    required: "<?= labels::get('@UI43'); ?>"
                },
                inputCode: {
                    required: "<?= labels::get('@UI43'); ?>",
                    remote: "<?= labels::get('@UI42'); ?>"
                }
            }
        });
    });

</script>

<div class="row container-fluid h-100">
    <div class="col-md-3"></div>
    <div class="col-md-6 pt-3">
        <div class="container">
            <div id="messages"></div>

            <form class="form" id="form-course" method="Post" action="<?= links::get('create-competence'); ?>">
                <h2 class="form-heading">
                    <?= labels::get('@PA15'); ?>
                </h2>

                <label for="inputLevel" class="sr-only">
                    <?= labels::get('@UI21'); ?>
                </label>

                <div class="form-group" type="text">
                    <select type="text" id="inputLevel" name="inputLevel" class="form-control"
                            required="" autofocus="" onchange="setLevelName()">
                        <option disabled selected value><?= labels::get('@UI21'); ?></option>
                        <?php
                        foreach ($LEVELS as $level) {
                            echo '<option value="' . $level->getId() . '">' . $level->getName() . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <input type="hidden" id="inputLevelName" name="inputLevelName">

                <label for="inputName" class="sr-only">
                    <?= labels::get('@UI22'); ?>
                </label>

                <input type="text" id="inputName" name="inputName" class="form-control"
                       placeholder="<?= labels::get('@UI22'); ?>" required="" autofocus="">
                <div class='spacer-5'></div>

                <label for="inputCode" class="sr-only">
                    <?= labels::get('@UI23'); ?>
                </label>

                <input type="text" id="inputCode" name="inputCode" class="form-control"
                       placeholder="<?= labels::get('@UI23'); ?>" required="">
                <div class='spacer-10'></div>

                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    <?= labels::get('@UI36'); ?>
                </button>
            </form>
            <div class="spacer-30">
            </div>
        </div>
    </div>
</div>