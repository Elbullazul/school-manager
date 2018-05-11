<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-11
 * Time: 11:14
 */

namespace Database\Managers;

use Objects\Factories\evaluations_competences_factory;
use Database\Repositories\evaluations_competences_repository;

class evaluations_competences_manager extends manager
{
    public function __construct()
    {
        $this->repository = new evaluations_competences_repository();
    }

    function find($model)
    {
        $entity = $this->repository->find('evaluation_id', $model->getEvaluationId());
        $ret = evaluations_competences_factory::construct_from_entity($entity);

        return $ret;
    }

    function fetch_all()
    {
        $entities = $this->repository->fetch_all();
        $ret = evaluations_competences_factory::construct_from_entities($entities);

        return $ret;
    }

    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

}