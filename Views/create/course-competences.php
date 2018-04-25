<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-25
 * Time: 14:41
 */

use Services\posts;
use Database\Entities\course_entity;

$course = new course_entity();
$course->setName(posts::get('inputName'));
$course->setCode(posts::get('inputCode'));
$course->setLevelId(posts::get('inputLevel'));

dump($course);