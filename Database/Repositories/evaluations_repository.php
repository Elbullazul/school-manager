<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-11
 * Time: 10:41
 */

namespace Database\Repositories;

use Database\query_builder;
use Database\Entities\evaluation_entity;

class evaluations_repository extends repository
{
    public function __construct()
    {
        $this->table = 'evaluations';
        $this->entity = evaluation_entity::class;
    }

    function find($field, $value)
    {
        $engine = new query_builder($this->entity, query_builder::FETCH);
        $engine->select(
            'id',
            'name',
            'description',
            'points',
            'ponderation',
            'is_final',
            'is_global_ponderation',
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
        // TODO: Implement find_all() method.
    }

    function save($model)
    {
        $engine = new query_builder($this->entity, query_builder::EXECUTE);
        $engine->insert($this->table, ['name', 'description', 'points', 'ponderation', 'is_final', 'is_global_ponderation'])
            ->values($model->getName(), $model->getDescription(), $model->getPoints(), $model->getPonderation(),
                $model->getIsFinal(), $model->getIsGlobalPonderation());
        $ret = $engine->execute();

        return $ret;
    }

    function update($field, $value, $model)
    {
        // TODO: Implement update() method.
    }

}