<?php

use Services\paths;
use Services\links;
use Services\labels;
use Services\globals;

// Fail safe
if (!globals::is_set('ERROR')) {
    redirect(links::get('login'));
}

?>

<!DOCTYPE html>

<html>
<head>
    <!-- local bootstrap copy -->
    <link href="<?= paths::resource('bootstrap-4.0.0/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"
          media="all"/>

    <!-- local overrides -->
    <link href="<?= paths::resource('css/overrides.css'); ?>" rel="stylesheet" type="text/css" media="all"/>

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body">
<div class="spacer-30"></div>
<div class="container-fluid text-center">
    <h1>
        <?= labels::get('@SYS07'); ?>
    </h1>
    <br/>
    <br/>
    <h3>
        <?= globals::get('ERROR'); ?>
    </h3>
    <br/>
    <button class="btn" onclick="history.go(-1);"><?= labels::get('@UI24'); ?></button>
</div>
</body>
</html>