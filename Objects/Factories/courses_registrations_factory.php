<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-07
 * Time: 14:27
 */

namespace Objects\Factories;

use Objects\Models\course_registration_model;

class courses_registrations_factory extends factory
{
    static function construct_empty()
    {
        return new course_registration_model();
    }

    static function construct(array $bundle)
    {
        if (count($bundle) == 2) {
            $model = new course_registration_model();
            $model->setStudentId($bundle['student_id']);
            $model->setCourseInstanceId($bundle['course_instance_id']);

            return $model;
        } else {
            return NULL;
        }
    }

}