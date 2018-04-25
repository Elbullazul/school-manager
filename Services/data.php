<?php

namespace Services;

abstract class data
{
    static function to_model($_entity, $_model)
    {
        foreach ($_entity->properties() as $field => $value) {
            if (array_key_exists($field, $_model->properties())) {
                $_model->$field($value);
            }
        }

        return $_model;
    }

    static function to_entity($_model, $_entity)
    {
        foreach ($_model->properties() as $field => $value) {
            if (array_key_exists($field, $_entity->properties())) {
                $_entity->$field($value);
            }
        }

        return $_entity;
    }

    static function find_entities($method, $value, $array) {
        $entities = array();

        foreach ($array as $entity) {
            if ($entity->$method() == $value) {
                $entities[] = $entity;
            }
        }

        return $entities;
    }

    static function find_entity($method, $value, $array) {
        foreach ($array as $entity) {
            if ($entity->$method() == $value) {
                return $entity;
            }
        }

        return NULL;
    }

}

?>