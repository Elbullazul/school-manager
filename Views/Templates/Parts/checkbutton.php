<script>
    $(document).ready(function(){
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '50%' // optional
        });
    });
</script>

<div class="checkbox">
    <label>
        <input class="m-2 check" type="checkbox" id="<?= $ID; ?>" name="<?= $NAME; ?>" value="1" <?= $CHECKED ? 'checked': ''; ?>>
        <?= $LABEL; ?>
    </label>
</div>