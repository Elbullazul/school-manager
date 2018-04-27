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
        <input class="m-2 check" type="checkbox" id="t1" name="t1" value="1" checked>
        <? //= labels::get('@UI32'); ?>
    </label>
</div>