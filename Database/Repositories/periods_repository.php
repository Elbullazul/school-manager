<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:11
 */

namespace Database\Repositories;

use Database\query_builder;
use Database\Entities\period_entity;

class periods_repository extends repository
{
    public function __construct()
    {
        $this->table = "periods";
        $this->entity = period_entity::class;
    }

    function find($field, $value)
    {
        $engine = new query_builder($this->entity, query_builder::FETCH);
        $engine->select(
            'id',
            'begins',
            'ends',
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
            'id',
            'begins',
            'ends',
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