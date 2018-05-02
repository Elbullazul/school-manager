<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 08:28
 */

namespace Objects\Factories;

abstract class factory
{
    abstract static function construct_empty();

    abstract static function construct(array $bundle);

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