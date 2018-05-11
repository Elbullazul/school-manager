<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-11
 * Time: 10:47
 */

namespace Database\Repositories;


use Database\Entities\evaluation_competence_entity;
use Database\query_builder;

class evaluations_competences_repository extends repository
{
    public function __construct()
    {
        $this->table = 'evaluations_competences';
        $this->entity = evaluation_competence_entity::class;
    }

    function find($field, $value)
    {
        $engine = new query_builder($this->entity, query_builder::FETCH);
        $engine->select(
            'ponderation',
            'evaluation_id',
            'competence_id',
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
        // TODO: Implement find_all() method.
    }

    function save($model)
    {
        $engine = new query_builder($this->entity, query_builder::EXECUTE);
        $engine->insert($this->table, [/*'ponderation', */'evaluation_id', 'competence_id'])
            ->values(/*$model->getPonderation(), */$model->getEvaluationId(), $model->getCompetenceId());
        $ret = $engine->execute();

        return $ret;
    }

    function update($field, $value, $model)
    {
        // TODO: Implement update() method.
    }

}