<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-29
 * Time: 14:35
 */

namespace Database\Managers;

use Database\Repositories\users_repository;

class user_manager extends manager
{
    function find($model)
    {
        $repository = new users_repository();
        $ret = $repository->find('user_id', $model->getUserId());

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
        $repository = new users_repository();
        $repository->destroy('user_id', $model->getId());
    }

    function destroy_all()
    {
        $repository = new users_repository();
        $ret = $repository->destroy_all();

        return $ret;
    }

}