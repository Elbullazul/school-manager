<?php
use Services\labels;
?>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">

        <div id="modal-content">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Header</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Modal content -->
                    <input type="text" id="inputCompName" name="inputCompName" class="form-control"
                           placeholder="<?= labels::get('@UI22'); ?>" required="" autofocus="">
                    <div class='spacer-5'></div>

                    <input type="text" id="inputCompCode" name="inputCompCode" class="form-control"
                           placeholder="<?= labels::get('@UI23'); ?>" required="" autofocus="">
                    <div class='spacer-5'></div>

                    <input type="number" min="0" id="inputCompDesc" name="inputCompDesc" class="form-control"
                           placeholder="<?= labels::get('@SYS01'); ?>" required="" autofocus="">
                    <div class='spacer-5'></div>

                    <textarea type="text" multiple="multiple" id="inputCompDesc" name="inputCompDesc" class="form-control"
                              placeholder="<?= labels::get('@UI19'); ?>" required="" autofocus=""></textarea>
                    <div class='spacer-5'></div>
                </div>

                <div class="modal-footer">
                    <button type="button" id="modalButton" class="btn btn-primary btn-default" data-dismiss="modal"
                            onclick="onAddCompetence()">Save
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>

    </div>
</div>