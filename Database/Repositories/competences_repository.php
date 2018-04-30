<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-26
 * Time: 20:52
 */

namespace Database\Repositories;

use Database\query_builder;
use Database\Entities\competence_entity;

class competences_repository extends repository
{
    public function __construct()
    {
        $this->table = "competences";
        $this->entity = competence_entity::class;
    }

    function find($field, $value)
    {
        $engine = new query_builder($this->entity, query_builder::FETCH);
        $engine->select(
            'id',
            'name',
            'code',
            'description',
            /* METADATA */
            'modified_by',
            'date_created',
            'date_modified')->from($this->table)->where($field . ' = ' . $value);
        $ret = $engine->execute();

        return $ret;
    }

    function find_all($field, $value)
    {
        $engine = new query_builder($this->entity, query_builder::FETCH_ALL);
        $engine->select(
            'id',
            'name',
            'code',
            'description',
            /* METADATA */
            'modified_by',
            'date_created',
            'date_modified')->from($this->table)->where($field . ' = ' . $value);
        $ret = $engine->execute();

        return $ret;
    }

    function save($model)
    {
        $engine = new query_builder($this->entity, query_builder::EXECUTE);
        $engine->insert($this->table, ['name', 'code', 'description'])
            ->values($model->getName(), $model->getCode(), $model->getDescription());
        $ret = $engine->execute();

        return $ret;
    }

    function update($field, $value, $model)
    {
        // TODO: Implement update() method.
    }

}