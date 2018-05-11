<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-02
 * Time: 10:38
 */

namespace Objects\Factories;

use Objects\Models\scholar_year_model;

abstract class scholar_years_factory extends factory
{
    static function construct_empty()
    {
        return new scholar_year_model();
    }

    static function construct(array $bundle)
    {
        if (count($bundle) == 3) {
            $model = new scholar_year_model();
            $model->setId($bundle['id']);
            $model->setBegins($bundle['begins']);
            $model->setEnds($bundle['ends']);

            return $model;
        } else {
            return NULL;
        }
    }

}