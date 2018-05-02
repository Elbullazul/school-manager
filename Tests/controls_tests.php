<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 20:10
 */

use Plugins\Rendering\button;

$button = new button();
$button->set_id('hello');
$button->disable(true);

dump($button);

$button->disable(false);
$button->focus(true);

dump($button);

$button->focus(false);

dump($button);

// TODO: Integrate better
$button->set_size(\Plugins\Rendering\CLASS_SIZE_LARGE);

dump($button);