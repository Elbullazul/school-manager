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
                    <h4 class="modal-title"><?= labels::get('@UI30'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Modal content -->
                    <input type="text" id="inputCompName" name="inputCompName" class="form-control"
                           placeholder="<?= labels::get('@UI27'); ?>" required="" autofocus="">
                    <div class='spacer-5'></div>

                    <input type="text" id="inputCompCode" name="inputCompCode" class="form-control"
                           placeholder="<?= labels::get('@UI28'); ?>" required="" autofocus="">
                    <div class='spacer-5'></div>

                    <textarea type="text" multiple="multiple" id="inputCompDesc" name="inputCompDesc"
                              class="form-control"
                              placeholder="<?= labels::get('@UI29'); ?>" required="" autofocus=""></textarea>
                    <div class='spacer-5'></div>

                    <input type="number" min="0" max="100" id="inputComp1Pond" name="inputCompDesc" class="form-control"
                           placeholder="<?= labels::get('@UI26').': '.labels::get('@UI32'); ?>" required="" autofocus="">
                    <div class='spacer-5'></div>

                    <input type="number" min="0" max="100" id="inputComp2Pond" name="inputCompDesc" class="form-control"
                           placeholder="<?= labels::get('@UI26').': '.labels::get('@UI33'); ?>" required="" autofocus="">
                    <div class='spacer-5'></div>

                    <input type="number" min="0" max="100" id="inputComp3Pond" name="inputCompDesc" class="form-control"
                           placeholder="<?= labels::get('@UI26').': '.labels::get('@UI34'); ?>" required="" autofocus="">
                    <div class='spacer-5'></div>

                </div>

                <div class="modal-footer">
                    <button type="button" id="modalButton" class="btn btn-primary btn-default" data-dismiss="modal"
                            onclick="save()">Save
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>

    </div>
</div>