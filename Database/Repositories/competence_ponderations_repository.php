<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-27
 * Time: 09:25
 */

namespace Database\Repositories;

use Database\query_builder;
use Database\Entities\competence_ponderation_entity;

class competence_ponderations_repository extends repository
{
    public function __construct()
    {
        $this->table = "competences_ponderations";
        $this->entity = competence_ponderation_entity::class;
    }

    function find($field, $value)
    {
        $engine = new query_builder($this->entity, query_builder::FETCH);
        $engine->select(
            'competence_id',
            'trimester_rank',
            'ponderation',
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
            'competence_id',
            'trimester_rank',
            'ponderation',
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
        $engine->insert($this->table, ['competence_id', 'trimester_rank', 'ponderation'])
            ->values($model->getCompetenceId(), $model->getTrimesterRank(), $model->getPonderation());
        $ret = $engine->execute();

        return $ret;
    }

    function update($field, $value, $model)
    {
        // TODO: Implement update() method.
    }
}