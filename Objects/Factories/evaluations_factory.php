<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-11
 * Time: 11:16
 */

namespace Objects\Factories;

use Objects\Models\evaluation_model;

class evaluations_factory extends factory
{
    static function construct_empty()
    {
        return new evaluation_model();
    }

    static function construct(array $bundle)
    {
        if (count($bundle) == 8) {
            $model = new evaluation_model();
            $model->setId($bundle['id']);
            $model->setCompetences($bundle['competences']);
            $model->setName($bundle['name']);
            $model->setDescription($bundle['description']);
            $model->setPoints($bundle['points']);
            $model->setPonderation($bundle['ponderation']);
            $model->setIsFinal($bundle['is_final']);
            $model->setIsGlobalPonderation($bundle['is_global_ponderation']);

            return $model;
        } else {
            return NULL;
        }
    }

}