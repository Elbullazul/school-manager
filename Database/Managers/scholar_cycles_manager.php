<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-01
 * Time: 08:53
 */

namespace Database\Managers;

use Objects\Factories\scholar_cycles_factory;
use Database\Repositories\scholar_cycles_repository;

class scholar_cycles_manager extends manager
{
    function find($model)
    {
        $repository = new scholar_cycles_repository();
        $entity = $repository->find('id', $model->getId());

        $ret = scholar_cycles_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_from_level($model)
    {
        $repository = new scholar_cycles_repository();
        $entity = $repository->find('id', $model->getCycleId());

        $ret = scholar_cycles_factory::construct_from_entity($entity);

        return $ret;
    }

    // TODO: Remove if invalid or restore if OK
//    function find_all($model)
//    {
//        $repository = new scholar_cycles_repository();
//        $entity = $repository->find_all('id', $model->getId());
//
//        $ret = scholar_cycles_factory::construct_from_entities($entity);
//
//        return $ret;
//    }

    function fetch_all()
    {
        $repository = new scholar_cycles_repository();
        $entity = $repository->fetch_all();

        $ret = scholar_cycles_factory::construct_from_entities($entity);

        return $ret;
    }

    function save($model)
    {
        $repository = new scholar_cycles_repository();
        $ret = $repository->save($model);

        return $ret;
    }

    function save_all(array $models)
    {
        $ret = [];
        $repository = new scholar_cycles_repository();

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
        $repository = new scholar_cycles_repository();
        $ret = $repository->destroy('id', $model->getId());

        return $ret;
    }

    function destroy_all()
    {
        $repository = new scholar_cycles_repository();
        $ret = $repository->destroy_all();

        return $ret;
    }

}