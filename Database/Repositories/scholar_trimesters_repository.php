<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:42
 */

namespace Database\Repositories;

use Database\query_builder;
use Database\Entities\scholar_trimester_entity;
use Services\date;

class scholar_trimesters_repository extends repository
{
    public function __construct()
    {
        $this->table = "scholar_trimesters";
        $this->entity = scholar_trimester_entity::class;
    }

    function find($field, $value)
    {
        $engine = new query_builder($this->entity, query_builder::FETCH);
        $engine->select(
            'id',
            'begins',
            'ends',
            'name',
            'rank',
            'scholar_year_id',
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
            'begins',
            'ends',
            'name',
            'rank',
            'scholar_year_id',
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
            'name',
            'rank',
            'scholar_year_id',
            /* METADATA */
            'modified_by',
            'date_created',
            'date_modified'
        )->from($this->table)->where('begins <= '.date::now())->and('ends >= '.date::now());
        $ret = $engine->execute();

        return $ret;
    }

    function find_current_and_future() {
        $engine = new query_builder($this->entity, query_builder::FETCH_ALL);
        $engine->select(
            'id',
            'begins',
            'ends',
            'name',
            'rank',
            'scholar_year_id',
            /* METADATA */
            'modified_by',
            'date_created',
            'date_modified'
        )->from($this->table)->where('begins <= '.date::now());
        $ret = $engine->execute();

        return $ret;
    }

    function save($model)
    {
        $engine = new query_builder($this->entity, query_builder::EXECUTE);
        $engine->insert($this->table, ['id', 'name', 'rank', 'scholar_year_id', 'begins', 'ends'])
            ->values($model->getId(), $model->getName(), $model->getRank(), $model->getScholarYearId(),
                $model->getBegins(), $model->getEnds());
        $ret = $engine->execute();

        return $ret;
    }

    function update($field, $value, $model)
    {
        // TODO: Implement update() method.
    }

}