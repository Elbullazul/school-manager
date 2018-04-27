<?php
use Services\labels;
?>

<button class="btn btn-primary m-3" onclick="history.go(-1);">
    <i class="fas fa-arrow-left"></i> <?= labels::get('@UI24'); ?>
</button>