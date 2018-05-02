<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-02
 * Time: 10:10
 */

namespace Database\Managers;

use Objects\Factories\periods_factory;
use Database\Repositories\periods_repository;

class periods_manager extends manager
{
    function find($model)
    {
        $repository = new periods_repository();
        $entity = $repository->find('id', $model->getId());

        $ret = periods_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_from_course_instance($model)
    {
        $repository = new periods_repository();
        $entity = $repository->find('id', $model->getDayId());
        $ret = periods_factory::construct_from_entity($entity);

        return $ret;
    }

    function fetch_all()
    {
        $repository = new periods_repository();
        $entities = $repository->fetch_all();

        $ret = periods_factory::construct_from_entities($entities);

        return $ret;
    }

    function save($model)
    {
        $repository = new periods_repository();
        $ret = $repository->save($model);

        return $ret;
    }

    function save_all(array $models)
    {
        $ret = [];
        $repository = new periods_repository();

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
        $repository = new periods_repository();
        $ret = $repository->destroy('id', $model->getId());

        return $ret;
    }

    function destroy_all()
    {
        $repository = new periods_repository();
        $ret = $repository->destroy_all();

        return $ret;
    }

}