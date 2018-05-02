<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-02
 * Time: 09:44
 */

namespace Database\Managers;

use Objects\Factories\course_instances_factory;
use Database\Repositories\courses_instances_repository;

class course_instances_manager extends manager
{
    // TODO: Implement concat of data
    function find($model)
    {
        $repository = new courses_instances_repository();
        $entity = $repository->find('id', $model->getId());

        $ret = course_instances_factory::construct_from_entity($entity);

        return $ret;
    }

    function fetch_all()
    {
        $repository = new courses_instances_repository();
        $entities = $repository->fetch_all();

        $ret = course_instances_factory::construct_from_entities($entities);

        return $ret;
    }

    function save($model)
    {
        $repository = new courses_instances_repository();
        $ret = $repository->save($model);

        return $ret;
    }

    function save_all(array $models)
    {
        $ret = [];
        $repository = new courses_instances_repository();

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
        $repository = new courses_instances_repository();
        $ret = $repository->destroy('id', $model->getId());

        return $ret;
    }

    function destroy_all()
    {
        $repository = new courses_instances_repository();
        $ret = $repository->destroy_all();

        return $ret;
    }

}