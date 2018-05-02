<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-01
 * Time: 10:50
 */

namespace Database\Managers;

use Database\Repositories\classes_repository;
use Objects\Factories\classes_factory;

class classes_manager extends manager
{
    function find($model)
    {
        $repository = new classes_repository();
        $entity = $repository->find($model->getId());

        $ret = classes_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_all($model)
    {
    }

    function fetch_all()
    {
        $repository = new classes_repository();
        $entity = $repository->fetch_all();

        $ret = classes_factory::construct_from_entity($entity);

        return $ret;
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