<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-29
 * Time: 18:35
 */

namespace Database\Managers;

use Objects\Factories\scholar_trimesters_factory;
use Database\Repositories\scholar_trimesters_repository;

class scholar_trimesters_manager extends manager
{
    function find($model)
    {
        $repository = new scholar_trimesters_repository();
        $entity = $repository->find('id', $model->getId());

        $ret = scholar_trimesters_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_current()
    {
        $repository = new scholar_trimesters_repository();
        $entity = $repository->find_current();

        $ret = scholar_trimesters_factory::construct_from_entity($entity);

        return $ret;
    }

    function fetch_all()
    {
        $repository = new scholar_trimesters_repository();
        $entities = $repository->fetch_all();

        $ret = scholar_trimesters_factory::construct_from_entities($entities);

        return $ret;
    }

    function save($model)
    {
        $repository = new scholar_trimesters_repository();
        $ret = $repository->save($model);

        return $ret;
    }

    function save_all(array $models)
    {
        $ret = [];
        $repository = new scholar_trimesters_repository();

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
        $repository = new scholar_trimesters_repository();
        $ret = $repository->destroy('id', $model->getId());

        return $ret;
    }

    function destroy_all()
    {
        $repository = new scholar_trimesters_repository();
        $ret = $repository->destroy_all();

        return $ret;
    }

}