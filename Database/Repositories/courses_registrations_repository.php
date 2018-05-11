<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-07
 * Time: 14:18
 */

namespace Database\Repositories;

use Database\query_builder;
use Database\Entities\course_registration_entity;

class courses_registrations_repository extends repository
{
    public function __construct()
    {
        $this->table = "courses_registrations";
        $this->entity = course_registration_entity::class;
    }

    function find($field, $value)
    {
        $engine = new query_builder($this->entity, query_builder::FETCH);
        $engine->select(
            'student_id',
            'course_instance_id',
            /* METADATA */
            'modified_by',
            'date_created',
            'date_modified'
        )->from($this->table)->where($field.' = '.$value);
        $ret = $engine->execute();

        return $ret;
    }

    function find_all($field, $value)
    {
        $engine = new query_builder($this->entity, query_builder::FETCH_ALL);
        $engine->select(
            'student_id',
            'course_instance_id',
            /* METADATA */
            'modified_by',
            'date_created',
            'date_modified'
        )->from($this->table)->where($field.' = '.$value);
        $ret = $engine->execute();

        return $ret;
    }

    function save($model)
    {
        // TODO: Implement save() method.
    }

    function update($field, $value, $model)
    {
        // TODO: Implement update() method.
    }

}