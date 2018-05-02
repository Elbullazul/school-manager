<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-01
 * Time: 10:50
 */

namespace Objects\Factories;

use Objects\Models\class_model;

abstract class classes_factory extends factory
{
    static function construct_empty()
    {
        return new class_model();
    }

    static function construct(array $bundle)
    {
        if (count($bundle) == 3) {
            $model = new class_model();
            $model->setId($bundle['id']);
            $model->setCode($bundle['code']);
            $model->setDescription($bundle['description']);

            return $model;
        } else {
            return NULL;
        }
    }
}