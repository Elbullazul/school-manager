<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 10:12
 */

namespace Objects\Factories;

use Objects\Models\competence_model;

class competences_factory extends factory
{
    static function construct_empty()
    {
        return new competence_model();
    }

    static function construct(array $bundle)
    {
        if (count($bundle) == 5) {
            $model = new competence_model();
            $model->setId($bundle['id']);
            $model->setName($bundle['name']);
            $model->setCode($bundle['code']);
            $model->setDescription($bundle['description']);
            $model->setPonderations($bundle['ponderations']);

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