<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 08:29
 */

namespace Objects\Factories;

use Objects\Models\scholar_cycle_model;

abstract class scholar_cycles_factory extends factory
{
    static function construct_empty()
    {
        return new scholar_cycle_model();
    }

    static function construct(array $bundle)
    {
        if (count($bundle) == 2) {
            $model = new scholar_cycle_model();

            $model->setId($bundle['id']);
            $model->setId($bundle['name']);

            return $model;
        } else {
            return NULL;
        }
    }

}