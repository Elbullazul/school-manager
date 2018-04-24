<?php

use Services\paths;
use Services\globals;

?>

<!DOCTYPE html>
<html>
<head>
    <title><?= globals::get_once('VIEW_TITLE'); ?></title>

    <!-- JQuery 3.3.1 -->
    <script type="text/javascript" src="<?= paths::resource('jquery-3.3.1/jquery-3.3.1.min.js'); ?>"></script>

    <!-- bootstrap JavaScript -->
    <script type="text/javascript"
            src="<?= paths::resource('bootstrap-4.0.0/js/bootstrap.bundle.min.js'); ?>"></script>

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
load(paths::view(globals::get('VIEW')));
load(paths::part('footer.php'));
?>
</body>
</html>