<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 09:08
 */

namespace Objects\Factories;

use Objects\Models\course_model;

abstract class courses_factory extends factory
{
    static function construct_empty()
    {
        return new course_model();
    }

    static function construct(array $bundle)
    {
        if (count($bundle) == 6) {
            $model = new course_model();

            $model->setId($bundle['id']);
            $model->setCode($bundle['code']);
            $model->setName($bundle['name']);
            $model->setLevel($bundle['level']);
            $model->setCompetences($bundle['competences']);
            $model->setDependencies($bundle['dependencies']);

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