<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-11
 * Time: 08:30
 */

use Services\labels;
use Core\ajax_service;

?>

<script>

    $(document).ready(function () {
        $('#scholar_year_form').validate({
            rules: {
                inputYearCode: {
                    required: true,
                    remote: {
                        type: 'post',
                        url: "<?= ajax_service::get_action_url('validate-scholar-year-code'); ?>",
                        data: {
                            code: function () {
                                return $('#inputYearCode').val();
                            }
                        }
                    }
                },
                inputYearBegins: {
                    required: true
                },
                inputYearEnds: {
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
                var code = $('#inputYearCode').val();
                var begins = $('#inputYearBegins').val();
                var ends = $('#inputYearEnds').val();

                $.ajax({
                    type: 'post',
                    url: "<?= ajax_service::get_action_url('save-scholar-year'); ?>",
                    data: {
                        code: code,
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
                            message: 'An error occurred. Please try again'
                        }, {
                            type: 'danger'
                        });
                    }
                });

                $('#modal_create_scholar_year').modal('hide');
            }
        });
    });

</script>

<!-- Modal -->
<div id="modal_create_scholar_year" class="modal fade" role="dialog" data-backdrop="static" style="z-index: 10000;">
    <div class="modal-dialog modal-lg">

        <div id="modal-content">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Create Schedule</h2>
                </div>
                <div class="modal-body">
                    <form id="scholar_year_form" data-async method="post">
                        <fieldset>
                            <div class="control-group">
                                <input type="text" id="inputYearCode" name="inputYearCode"
                                       class="form-control" autofocus=""
                                       placeholder="Scholar year code (no spaces)">
                                <div class="spacer-5"></div>
                            </div>
                            <div class="control-group">
                                <input type="date" id="inputYearBegins" name="inputYearBegins"
                                       class="form-control"
                                       placeholder="Scholar year beginning date">
                                <div class="spacer-5"></div>
                            </div>
                            <div class="control-group">
                                <input type="date" id="inputYearEnds" name="inputYearEnds"
                                       class="form-control"
                                       placeholder="Scholar year beginning date">
                                <div class="spacer-5"></div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="scholar_year_form" id="modalButton" class="btn btn-primary btn-default">
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

