<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-02
 * Time: 09:45
 */

namespace Objects\Factories;


use Objects\Models\course_instance_model;

abstract class course_instances_factory extends factory
{
    static function construct_empty()
    {
        return new course_instance_model();
    }

    static function construct(array $bundle)
    {
        if (count($bundle) == 7) {
            $model = new course_instance_model();
            $model->setId($bundle['id']);
            $model->setCourse($bundle['course_id']);
            $model->setTeacherId($bundle['teacher_id']);
            $model->setTrimesterId($bundle['trimester_id']);
            $model->setClass($bundle['class_id']);
            $model->setDay($bundle['day_id']);
            $model->setPeriod($bundle['period_id']);

            return $model;
        } else {
            return NULL;
        }
    }

}