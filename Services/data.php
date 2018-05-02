<?php

namespace Services;

abstract class data
{
    static function find_entities($method, $value, $array)
    {
        $entities = array();

        foreach ($array as $entity) {
            if ($entity->$method() == $value) {
                $entities[] = $entity;
            }
        }

        return $entities;
    }

    static function find_entity($method, $value, $array)
    {
        foreach ($array as $entity) {
            if ($entity->$method() == $value) {
                return $entity;
            }
        }

        return NULL;
    }

    static function search_sub_array($key, $value, $array)
    {
        foreach ($array as $tuple) {
            if ($tuple[$key] == $value) {
                return $tuple;
            }
        }

        return NULL;
    }

    static function get_course($day, $period, $courses) {
        foreach ($courses as $course) {
            if ($course->getDay()->getId() == $day && $course->getPeriod()->getId() == $period) {
                return $course;
            }
        }
    }

    static function unix_path($path) {
        return str_replace("\\", '/', $path);
    }

}

?>