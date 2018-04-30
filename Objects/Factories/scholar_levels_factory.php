<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 08:29
 */

namespace Objects\Factories;

use Objects\Models\scholar_level_model;

abstract class scholar_levels_factory extends factory
{
    static function construct_empty()
    {
        return new scholar_level_model();
    }

    static function construct(array $bundle)
    {
        if (count($bundle) == 3) {
            $model = new scholar_level_model();

            $model->setId($bundle['id']);
            $model->setId($bundle['name']);
            $model->setId($bundle['cycle_id']);

            return $model;
        } else {
            return NULL;
        }
    }

    static function construct_from_entity($entity) {
        $model = $entity->to_model();
        return $model;
    }

    static function construct_from_entities(array $entities) {
        $models = [];

        foreach ($entities as $entity) {
            $models[] = $entity->to_model();
        }

        return $models;
    }
}