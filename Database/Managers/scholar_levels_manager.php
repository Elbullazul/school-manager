<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 08:20
 */

namespace Database\Managers;

use Objects\Factories\scholar_levels_factory;
use Database\Repositories\scholar_levels_repository;

class scholar_levels_manager extends manager
{
    // TODO: Get Cycle info when loading

    function find($model)
    {
        $repository = new scholar_levels_repository();
        $entity = $repository->find('id', $model->getId());

        $ret = scholar_levels_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_from_course($model)
    {
        $repository = new scholar_levels_repository();
        $entity = $repository->find('id', $model->getLevelId());

        $ret = scholar_levels_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_all($model)
    {
        $repository = new scholar_levels_repository();
        $entities = $repository->find_all('id', $model->getId());

        $ret = scholar_levels_factory::construct_from_entities($entities);

        return $ret;
    }

    function fetch_all()
    {
        $repository = new scholar_levels_repository();
        $entities = $repository->fetch_all();

        $ret = scholar_levels_factory::construct_from_entities($entities);

        return $ret;
    }

    function save($model)
    {
        $repository = new scholar_levels_repository();
        $ret = $repository->save($model);

        return $ret;
    }

    function save_all(array $models)
    {
        $ret = [];
        $repository = new scholar_levels_repository();

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
        $repository = new scholar_levels_repository();
        $ret = $repository->destroy('id', $model->getId());

        return $ret;
    }

    function destroy_all()
    {
        $repository = new scholar_levels_repository();
        $ret = $repository->destroy_all();

        return $ret;
    }

}