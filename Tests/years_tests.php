<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-02
 * Time: 11:08
 */

use Database\Managers\scholar_years_manager;

$manager = new scholar_years_manager();
$year_model = $manager->find_current();

dump($year_model);