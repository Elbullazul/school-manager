<?php

namespace Database\Repositories;

use Database\query_builder;
use Database\Entities\user_type_entity;

class user_types_repository extends repository
{
    public function __construct()
    {
        $this->table = "user_types";
        $this->entity = user_type_entity::class;
    }

    function find($field, $value)
    {
        $engine = new query_builder($this->entity, query_builder::FETCH);
        $engine->select(
            'type_id',
            'access_level',
            'type',
            'description',
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
            'type_id',
            'access_level',
            'type',
            'description',
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
        return false;
    }

    function update($field, $value, $model)
    {
        return false;
    }
}


?>
