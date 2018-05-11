<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 18:08
 */

use Services\paths;
use Services\labels;
use Core\ajax_service;

load(paths::modal('scholar-year-dialog.php'));

?>

<script>

    $(document).ready(function () {
        $('#trimester_form').validate({
            rules: {
                inputTrimesterName: {
                    required: true
                },
                inputTrimesterCode: {
                    required: true,
                    remote: {
                        type: $('#trimester_form').attr('method'),
                        url: "<?= ajax_service::get_action_url('validate-trimester-code'); ?>",
                        data: {
                            trimester_code: function () {
                                return $('#inputTrimesterCode').val();
                            }
                        }
                    }
                },
                inputTrimesterYear: {
                    required: true
                },
                inputTrimesterRank: {
                    required: true
                },
                inputTrimesterBegins: {
                    required: true
                },
                inputTrimesterEnds: {
                    required: true
                }
            },
            // TODO: Implement error messages
//            messages {
//
//            },
            highlight: function (element) {
                $(element).closest('.control-group')
                    .removeClass('success').addClass('danger');
            },
            success: function (element) {
                element.addClass('valid').closest('.control-group')
                    .removeClass('danger').addClass('success');
                element.remove();
            },
            submitHandler: function (form) {
                var code = $('#inputTrimesterCode').val();
                var name = $('#inputTrimesterName').val();
                var year_id = $('#inputTrimesterYearId').val();
                var rank = $('#inputTrimesterRank').val();
                var begins = $('#inputTrimesterBegins').val();
                var ends = $('#inputTrimesterEnds').val();

                $.ajax({
                    type: 'post',
                    url: "<?= ajax_service::get_action_url('save-trimester'); ?>",
                    data: {
                        code: code,
                        name: name,
                        year_id: year_id,
                        rank: rank,
                        begins: begins,
                        ends: ends
                    },
                    success: function (result) {
                        $.notify({
                            // TODO: refresh the page after
                            message: result
                        }, {
                            type: 'success'
                        });

                        setTimeout(
                            function () {
                                location.reload();
                            }, 2000);
                    },
                    error: function (result) {
                        $.notify({
                            message: 'An error ocurred. Please try again'
                        }, {
                            type: 'danger'
                        });
                    }
                });

                $('#modal_trimester').modal('hide');
            }
        });

        $();


        $('#modal_trimester').on('show.bs.modal', function () {
            removeData(this);
        });

        function removeData(modal) {
            $(modal).find('input,textarea').val('');
        };
    });
</script>

<!-- Modal -->
<div id="modal_trimester" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">

        <div id="modal-content">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Create Schedule</h2>
                </div>
                <div class="modal-body">
                    <form id="trimester_form" data-async method="post">
                        <fieldset>
                            <div class="control-group">
                                <input type="text" id="inputTrimesterCode" name="inputTrimesterCode"
                                       class="form-control" autofocus=""
                                       placeholder="Trimester code (no spaces)">
                                <div class="spacer-5"></div>
                            </div>
                            <div class="control-group">
                                <input type="text" id="inputTrimesterName" name="inputTrimesterName"
                                       class="form-control"
                                       placeholder="Trimester name">
                                <div class="spacer-5"></div>
                            </div>
                            <div class="control-group">
                                <select type="text" id="inputTrimesterYearId" name="inputTrimesterYearId"
                                        class="form-control">
                                    <option selected disabled>Scholar year</option>
                                    <?php
                                    foreach ($YEARS as $year) { ?>
                                        <option><?= $year->getId(); ?></option>
                                    <?php }
                                    ?>
                                </select>
                                <div class="spacer-5"></div>
                            </div>
                            <button type="button" class="btn btn-secondary btn-block"  data-toggle="modal" data-target="#modal_create_scholar_year">
                                Create new scholar year
                            </button>
                            <div class="spacer-5"></div>

                            <div class="control-group">
                                <select type="text" id="inputTrimesterRank" name="inputTrimesterRank"
                                        class="form-control">
                                    <option disabled selected>Trimester rank (1st, 2nd...)</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                                <div class="spacer-5"></div>
                            </div>
                            <div class="control-group">
                                <input type="date" id="inputTrimesterBegins" name="inputTrimesterBegins"
                                       class="form-control"
                                       placeholder="Trimester beginning date">
                                <div class="spacer-5"></div>
                            </div>
                            <div class="control-group">
                                <input type="date" id="inputTrimesterEnds" name="inputTrimesterEnds"
                                       class="form-control"
                                       placeholder="Trimester beginning date">
                                <div class="spacer-5"></div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="trimester_form" id="modalButton" class="btn btn-primary btn-default">
                        Save
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
