<?php

use Services\paths;

?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $TITLE; ?></title>

    <!-- JQuery 3.3.1 -->
    <script type="text/javascript" src="<?= paths::resource('jquery-3.3.1/jquery-3.3.1.min.js'); ?>"></script>

    <!-- JQuery Validate -->
    <script type="text/javascript" src="<?= paths::resource('jquery-validation-1.17.0/jquery.validate.min.js'); ?>"></script>

    <!-- bootstrap JavaScript -->
    <script type="text/javascript"
            src="<?= paths::resource('bootstrap-4.0.0/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- bootstrap notify: https://github.com/mouse0270/bootstrap-notify -->
    <script type="text/javascript"
            src="<?= paths::resource('bootstrap-notify-3.1.3\bootstrap-notify.min.js'); ?>"></script>

    <!-- animate: https://daneden.github.io/animate.css/ -->
    <link href="<?= paths::resource('css\animate.css'); ?>" rel="stylesheet" type="text/css" media="all"/>

    <!-- icheck (beautify checkradio): https://github.com/fronteed/icheck -->
    <link href="<?= paths::resource('icheck-1.x/square/blue.css'); ?>" rel="stylesheet">
    <script src="<?= paths::resource('icheck-1.x/icheck.min.js'); ?>"></script>

    <!-- fontawesome icon font -->
    <script type="text/javascript"
            src="<?= paths::resource('fontawesome-free-5.0.8/svg-with-js/js/fontawesome.js'); ?>"></script>
    <script type="text/javascript"
            src="<?= paths::resource('fontawesome-free-5.0.8/svg-with-js/js/fa-solid.js'); ?>"></script>

    <!-- local bootstrap copy -->
    <link href="<?= paths::resource('bootstrap-4.0.0/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"
          media="all"/>

    <!-- local overrides -->
    <link href="<?= paths::resource('css/overrides.css'); ?>" rel="stylesheet" type="text/css" media="all"/>

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
load(paths::part('header.php'));
load(paths::part('show-flashes.php'));
load(paths::view($FILE), $data);
load(paths::part('footer.php'));
?>
</body>
</html>