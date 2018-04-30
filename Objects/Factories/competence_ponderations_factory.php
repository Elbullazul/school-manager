<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 10:18
 */

namespace Objects\Factories;

use Objects\Models\competence_ponderation_model;

class competence_ponderations_factory extends factory
{
    static function construct_empty()
    {
        return new competence_ponderation_model();
    }

    static function construct(array $bundle)
    {
        if (count($bundle) == 3) {
            $model = new competence_ponderation_model();
            $model->setCompetenceId($bundle['competence_id']);
            $model->setTrimesterRank($bundle['trimester_rank']);
            $model->setPonderation($bundle['ponderation']);

            return $model;
        } else {
            return NULL;
        }
    }

    static function construct_from_entity($entity)
    {
        $model = $entity->to_model();
        return $model;
    }

    static function construct_from_entities(array $entities)
    {
        $models = [];

        foreach ($entities as $entity) {
            $models[] = $entity->to_model();
        }

        return $models;
    }

}