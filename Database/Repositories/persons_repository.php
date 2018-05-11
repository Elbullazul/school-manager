<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-04
 * Time: 09:59
 */

namespace Database\Repositories;

use Database\query_builder;
use Database\Entities\person_entity;

class persons_repository extends repository
{
    public function __construct()
    {
        $this->table = 'persons';
        $this->entity = person_entity::class;
    }

    function find($field, $value)
    {
        $engine = new query_builder($this->entity, query_builder::FETCH);
        $engine->select(
            'id',
            'telephone_number',
            'first_name',
            'last_name',
            'birthdate',
            'sex',
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
            'telephone_number',
            'first_name',
            'last_name',
            'birthdate',
            'sex',
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
        // TODO: Implement update() method.
    }

}