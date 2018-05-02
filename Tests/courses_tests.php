<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 10:23
 */

use Objects\Models\course_model;
use Database\Managers\courses_manager;
use Objects\Factories\courses_factory;

// Test course loading data
$course = new course_model();
$course->setId(1);
$course->setLevel(1);

$courses_manager = new courses_manager();
$course_constructed = $courses_manager->find($course);

//dump($course_constructed);

// load all courses
$courses_models = $courses_manager->fetch_all();
//dump($courses_models);

$code = 'ANG-01';
$course_model = courses_factory::construct(
    [
        'id' => NULL, 'code' => $code, 'name' => NULL,
        'level' => NULL, 'competences' => NULL, 'dependencies' => []
    ]);

$course_manager = new courses_manager();
if ($course_manager->exists($course_model)) {
    echo 'Found';
} else {
    echo 'Not found';
}