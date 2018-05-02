<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 12:44
 */

namespace Objects\Factories;

use Objects\Models\user_type_model;

abstract class user_types_factory extends factory
{
    static function construct_empty()
    {
        return new user_type_model();
    }

    static function construct(array $bundle)
    {
        if (count($bundle) == 4) {
            $model = new user_type_model();
            $model->setType($bundle['type']);
            $model->setTypeId($bundle['type_id']);
            $model->setDescription($bundle['description']);
            $model->setAccessLevel($bundle['access_level']);

            return $model;
        } else {
            return NULL;
        }
    }

}