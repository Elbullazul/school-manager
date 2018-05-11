<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 11:14
 */

namespace Database\Managers;

use Objects\Factories\competence_ponderations_factory;
use Database\Repositories\competence_ponderations_repository;

class competence_ponderations_manager extends manager
{
    public function __construct()
    {
        $this->repository = new competence_ponderations_repository();
    }

    function find($model)
    {
        $entity = $this->repository->find('competence_id', $model->getCompetenceId());
        $ret = competence_ponderations_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_from_competence($model)
    {
        $entity = $this->repository->find('competence_id', $model->getId());
        $ret = competence_ponderations_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_all($model)
    {
        $entities = $this->repository->find_all('competence_id', $model->getCompetenceId());
        $ret = competence_ponderations_factory::construct_from_entities($entities);

        return $ret;
    }

    function find_all_from_competence($model)
    {
        $entities = $this->repository->find_all('competence_id', $model->getId());
        $ret = competence_ponderations_factory::construct_from_entities($entities);

        return $ret;
    }

    function fetch_all()
    {
        $entities = $this->repository->fetch_all();
        $ret = competence_ponderations_factory::construct_from_entities($entities);

        return $ret;
    }

    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

    function destroy($model)
    {
        $ret = $this->repository->destroy('competence_id', $model->getId());

        return $ret;
    }


}