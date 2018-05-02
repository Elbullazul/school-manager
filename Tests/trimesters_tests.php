<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-02
 * Time: 10:59
 */

use Database\Managers\scholar_trimesters_manager;

$manager = new scholar_trimesters_manager();
$trimester_model = $manager->find_current();

dump($trimester_model);