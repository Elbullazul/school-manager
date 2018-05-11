<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-07
 * Time: 08:20
 */

namespace Objects\Factories;

use Objects\Models\teacher_model;

class executives_factory extends factory
{
    static function construct_empty()
    {
        return new teacher_model();
    }

    static function construct(array $bundle)
    {
        if (count($bundle) == 8) {
            $model = new teacher_model();
            $model->setId($bundle['student_id']);
            $model->setPersonId($bundle['person_id']);
            $model->setUserId($bundle['user_id']);
            // Person data
            $model->setTelephoneNumber($bundle['telephone_number']);
            $model->setFirstName($bundle['first_name']);
            $model->setLastName($bundle['last_name']);
            $model->setBirthdate($bundle['birthdate']);
            $model->setSex($bundle['sex']);

            return $model;
        } else {
            return NULL;
        }
    }

}