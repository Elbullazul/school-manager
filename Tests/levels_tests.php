<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-01
 * Time: 09:09
 */

use Objects\Models\scholar_level_model;
use Database\Managers\scholar_levels_manager;

$level_model = new scholar_level_model();
$level_model->setId(1);
$level_model->setName('1e Année');

$level_manager = new scholar_levels_manager();
$concat_level_model = $level_manager->find($level_model);

dump($concat_level_model);

$concat_level_models = $level_manager->fetch_all();
dump($concat_level_models);