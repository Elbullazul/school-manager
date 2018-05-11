<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-02
 * Time: 10:31
 */

namespace Objects\Factories;

use Objects\Models\scholar_trimester_model;

abstract class scholar_trimesters_factory extends factory
{
    static function construct_empty()
    {
        return new scholar_trimester_model();
    }

    static function construct(array $bundle)
    {
        if (count($bundle) == 6) {
            $model = new scholar_trimester_model();
            $model->setId($bundle['id']);
            $model->setName($bundle['name']);
            $model->setScholarYearId($bundle['scholar_year_id']);
            $model->setRank($bundle['rank']);
            $model->setBegins($bundle['begins']);
            $model->setEnds($bundle['ends']);

            return $model;
        } else {
            return NULL;
        }
    }

}