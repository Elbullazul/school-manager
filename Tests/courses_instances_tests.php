<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-02
 * Time: 11:10
 */

use Objects\Models\course_instance_model;
use Database\Managers\course_instances_manager;

$manager = new course_instances_manager();
$course_instance_models = $manager->fetch_current();

dump($course_instance_models);

$instance_model = new course_instance_model();
$instance_model->setId(1);
$course_instance_model = $manager->find($instance_model);

dump($course_instance_model);