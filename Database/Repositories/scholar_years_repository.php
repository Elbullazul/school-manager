<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:35
 */

namespace Database\Repositories;

use Database\query_builder;
use Database\Entities\scholar_year_entity;
use Services\date;

class scholar_years_repository extends repository
{
    public function __construct()
    {
        $this->table = "scholar_years";
        $this->entity = scholar_year_entity::class;
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
        )->from($this->table)->where($field . ' = ' . $value);
        $ret = $engine->execute();

        return $ret;
    }

    function find_current() {
        $engine = new query_builder($this->entity, query_builder::FETCH);
        $engine->select(
            'id',
            'begins',
            'ends',
            /* METADATA */
            'modified_by',
            'date_created',
            'date_modified'
        )->from($this->table)->where('begins <= '.date::now())->and('ends >= '.date::now());
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
        )->from($this->table)->where($field . ' = ' . $value);
        $ret = $engine->execute();

        return $ret;
    }


    function save($_model)
    {
        // TODO: Implement save() method.
    }

    function update($field, $value, $model)
    {
        // TODO: Implement update() method.
    }

}