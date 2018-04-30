<?php

namespace Database\Repositories;

use Database\query_builder;
use Database\Entities\user_entity;

class users_repository extends repository
{
    public function __construct()
    {
        $this->table = "users";
        $this->entity = user_entity::class;
    }

    function find($field, $value)
    {
        $engine = new query_builder($this->entity, query_builder::FETCH);
        $engine->select(
            'user_id',
            'username',
            'user_type',
            'password',
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
            'user_id',
            'username',
            'user_type',
            'password',
            /* METADATA */
            'modified_by',
            'date_created',
            'date_modified'
        )->from($this->table)->where($field . ' = ' . $value);
        $ret = $engine->execute();

        return $ret;
    }

    function save($_model)
    {
        return false;
    }

    function update($field, $value, $model)
    {
        return false;
    }

}
