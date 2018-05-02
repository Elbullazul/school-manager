<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-02
 * Time: 09:56
 */

namespace Objects\Factories;

use Objects\Models\day_model;

abstract class days_factory extends factory
{
    static function construct_empty()
    {
        return new day_model();
    }

    static function construct(array $bundle)
    {
        if (count($bundle) == 2) {
            $model = new day_model();
            $model->setId($bundle['id']);
            $model->setName($bundle['name']);

            return $model;
        } else {
            return NULL;
        }
    }

}