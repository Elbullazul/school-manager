<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 12:43
 */

namespace Database\Managers;


use Database\Repositories\user_types_repository;
use Objects\Factories\user_types_factory;

class user_types_manager extends manager
{
    function find($model)
    {
        $repository = new user_types_repository();
        $entity = $repository->find('type_id', $model->getTypeId());

        $ret = user_types_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_from_user($model)
    {
        $repository = new user_types_repository();
        $entity = $repository->find('type_id', $model->getUserType());

        $ret = user_types_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_all($model)
    {
        // TODO: Implement find_all() method.
    }

    function fetch_all()
    {
        // TODO: Implement fetch_all() method.
    }

    function save($model)
    {
        // TODO: Implement save() method.
    }

    function save_all(array $models)
    {
        // TODO: Implement save_all() method.
    }

    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

    function destroy($model)
    {
        // TODO: Implement destroy() method.
    }

    function destroy_all()
    {
        // TODO: Implement destroy_all() method.
    }

}