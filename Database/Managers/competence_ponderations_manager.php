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
    function find($model)
    {
        $repository = new competence_ponderations_repository();
        $entity = $repository->find('competence_id', $model->getCompetenceId());

        $ret = competence_ponderations_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_from_competence($model) {
        $repository = new competence_ponderations_repository();
        $entity = $repository->find('competence_id', $model->getId());

        $ret = competence_ponderations_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_all($model)
    {
        $repository = new competence_ponderations_repository();
        $entities = $repository->find_all('competence_id', $model->getCompetenceId());

        $ret = competence_ponderations_factory::construct_from_entities($entities);

        return $ret;
    }

    function find_all_from_competence($model) {
        $repository = new competence_ponderations_repository();
        $entities = $repository->find_all('competence_id', $model->getId());

        $ret = competence_ponderations_factory::construct_from_entities($entities);

        return $ret;
    }

    function fetch_all()
    {
        $repository = new competence_ponderations_repository();
        $entities = $repository->fetch_all();

        $ret = competence_ponderations_factory::construct_from_entities($entities);

        return $ret;
    }

    function save($model)
    {
        $repository = new competence_ponderations_repository();
        $ret = $repository->save($model);

        return $ret;
    }

    function save_all(array $models)
    {
        $ret = [];
        $repository = new competence_ponderations_repository();

        foreach ($models as $model) {
            $ret[] = $repository->save($model);
        }

        return $ret;
    }

    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

    function destroy($model)
    {
        $repository = new competence_ponderations_repository();
        $ret = $repository->destroy('id', $model->getCompetenceId());

        return $ret;
    }

    function destroy_all()
    {
        $repository = new competence_ponderations_repository();
        $ret = $repository->destroy_all();

        return $ret;
    }

}