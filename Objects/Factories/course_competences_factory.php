<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 10:44
 */

namespace Objects\Factories;

use Objects\Models\course_competence_model;

class course_competences_factory extends factory
{
    static function construct_empty()
    {
        return new course_competence_model();
    }

    static function construct(array $bundle)
    {
        if (count($bundle) == 2) {
            $model = new course_competence_model();
            $model->setCourseId($bundle['course_id']);
            $model->setCompetenceId($bundle['competence_id']);

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