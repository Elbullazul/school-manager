<?php

use Services\labels;
use Services\users;
use Services\links;

// go to dashboard if connected
if (users::connected())
    redirect(links::get('dashboard'));

?>

<div class="spacer-15"></div>
<div class="col-md-3">
</div>
<div class="container col-md-4">

    <form class="form-signin" id="form-signin" method="Post" action="<?= links::get('connecting'); ?>">
        <h2 class="form-signin-heading">
            <?= labels::get('@UI03'); ?>
        </h2>
        <label for="inputEmail" class="sr-only">
            <?= labels::get('@UI08'); ?>
        </label>
        <input type="text" id="inputUser" name="inputUser" class="form-control"
               placeholder="<?= labels::get('@UI08'); ?>" required="" autofocus="">
        <div class='spacer-5'></div>
        <label for="inputPassword" class="sr-only">
            <?= labels::get('@UI05'); ?>
        </label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control"
               placeholder="<?= labels::get('@UI05'); ?>" required="">
        <div class='spacer-5'></div>
        <div class='spacer-5'></div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">
            <?= labels::get('@UI07'); ?>
        </button>
    </form>

</div>
