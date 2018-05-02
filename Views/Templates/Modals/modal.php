<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 18:08
 */

?>

<!-- Modal -->
<div id="modal_<?= $NAME; ?>" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">

        <div id="modal-content">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <?= $HEADER; ?>
                </div>
                <div class="modal-body">
                    <?= $CONTENT; ?>
                </div>
                <div class="modal-footer">
                    <?= $FOOTER; ?>
                </div>
            </div>
        </div>
    </div>
</div>
