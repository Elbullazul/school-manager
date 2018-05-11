<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-07
 * Time: 15:05
 */

namespace Objects\Factories;

use Objects\Models\absence_model;

class absences_factory extends factory
{
    static function construct_empty()
    {
        return new absence_model();
    }

    static function construct(array $bundle)
    {
        if (count($bundle) == 7) {
            $model = new absence_model();
            $model->setId($bundle['id']);
            $model->setCourseInstanceId($bundle['course_instance_id']);
            $model->setStudentId($bundle['student_id']);
            $model->setTeacherId($bundle['teacher_id']);
            $model->setDate($bundle['date']);
            $model->setTimeAbsent($bundle['time_absent']);
            $model->setComment($bundle['comment']);

            return $model;
        } else {
            return NULL;
        }
    }

}