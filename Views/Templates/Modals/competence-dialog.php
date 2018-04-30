<?php

use Services\labels;

?>

<!-- Modal -->
<div id="competence-modal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">

        <div id="modal-content">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= labels::get('@UI30'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Modal content -->
                    <form class="form" id="competence-form" data-async method="post">
                        <fieldset>
                            <div class="control-group">
                                <input type="text" id="inputCompName" name="inputCompName" class="form-control"
                                       placeholder="<?= labels::get('@UI27'); ?>" required="" autofocus="">
                                <div class='spacer-5'></div>
                            </div>

                            <div class="control-group">
                                <input type="text" id="inputCompCode" name="inputCompCode" class="form-control"
                                       placeholder="<?= labels::get('@UI28'); ?>" required="" autofocus="">
                                <div class='spacer-5'></div>
                            </div>

                            <div class="control-group">
                            <textarea type="text" multiple="multiple" id="inputCompDesc" name="inputCompDesc"
                                      class="form-control"
                                      placeholder="<?= labels::get('@UI29'); ?>" required="" autofocus=""></textarea>
                                <div class='spacer-5'></div>
                            </div>

                            <div class="control-group">
                                <input type="number" min="0" max="100" id="inputComp1Pond" name="inputComp1Pond"
                                       class="form-control"
                                       placeholder="<?= labels::get('@UI26') . ': ' . labels::get('@UI32'); ?>"
                                       required=""
                                       autofocus="">
                                <div class='spacer-5'></div>
                            </div>

                            <div class="control-group">
                                <input type="number" min="0" max="100" id="inputComp2Pond" name="inputComp2Pond"
                                       class="form-control"
                                       placeholder="<?= labels::get('@UI26') . ': ' . labels::get('@UI33'); ?>"
                                       required=""
                                       autofocus="">
                                <div class='spacer-5'></div>
                            </div>

                            <div class="control-group">
                                <input type="number" min="0" max="100" id="inputComp3Pond" name="inputComp3Pond"
                                       class="form-control"
                                       placeholder="<?= labels::get('@UI26') . ': ' . labels::get('@UI34'); ?>"
                                       required=""
                                       autofocus="">
                                <div class='spacer-5'></div>
                            </div>
                        </fieldset>
                    </form>
                </div>

                <div class="modal-footer">
                    <!--data-dismiss="modal" onclick="onSaveClick()"-->
                    <button type="submit" form="competence-form" id="modalButton" class="btn btn-primary btn-default">
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