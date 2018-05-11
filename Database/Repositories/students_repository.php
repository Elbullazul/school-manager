<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-04
 * Time: 11:16
 */

namespace Database\Repositories;

use Database\query_builder;
use Database\Entities\student_entity;

class students_repository extends repository
{
    public function __construct()
    {
        $this->table = 'students';
        $this->entity = student_entity::class;
    }

    function find($field, $value)
    {
        $engine = new query_builder($this->entity, query_builder::FETCH);
        $engine->select(
            'id',
            'person_id',
            'user_id',
            /* METADATA */
            'modified_by',
            'date_created',
            'date_modified'
        )->from($this->table)->where($field . ' = ' . $value);
        $ret = $engine->execute();

        return $ret;
    }

    function find_all($field, $value)
    {
        $engine = new query_builder($this->entity, query_builder::FETCH_ALL);
        $engine->select(
            'id',
            'person_id',
            'user_id',
            /* METADATA */
            'modified_by',
            'date_created',
            'date_modified'
        )->from($this->table)->where($field . ' = ' . $value);
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