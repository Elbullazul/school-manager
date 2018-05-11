<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-23
 * Time: 14:08
 */

namespace Database\Repositories;

use Database\query_builder;
use Database\Entities\course_entity;

class courses_repository extends repository
{
    public function __construct()
    {
        $this->table = "courses";
        $this->entity = course_entity::class;
    }

    function find($field, $value)
    {
        $engine = new query_builder($this->entity, query_builder::FETCH);
        $engine->select(
            'id',
            'code',
            'name',
            'level_id',
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
            'code',
            'name',
            'level_id',
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
        $engine = new query_builder($this->entity, query_builder::EXECUTE);
        $engine->insert($this->table, ['code', 'name', 'level_id'])
            ->values($model->getCode(), $model->getName(), $model->getLevel());
        $ret = $engine->execute();

        return $ret;
    }

    function update($field, $value, $model)
    {
        return false;
    }
}