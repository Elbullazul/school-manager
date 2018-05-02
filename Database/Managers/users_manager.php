<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-29
 * Time: 14:35
 */

namespace Database\Managers;

use Objects\Factories\users_factory;
use Database\Repositories\users_repository;

class users_manager extends manager
{
    function find($model)
    {
        $users_repository = new users_repository();
        $user_entity = $users_repository->find('user_id', $model->getUserId());

        $user_types_manager = new user_types_manager();
        $user_type_model = $user_types_manager->find_from_user($user_entity);

        $user_model = users_factory::construct_from_entity($user_entity);
        $user_model->setUserType($user_type_model);

        return $user_model;
    }

    function find_by_username($model)
    {
        $users_repository = new users_repository();
        $user_entity = $users_repository->find('username', $model->getUsername());

        dump($user_entity);

        // TODO: concat user type
        $user_types_manager = new user_types_manager();
        $user_type_model = $user_types_manager->find_from_user($user_entity);

        $user_model = users_factory::construct_from_entity($user_entity);
        $user_model->setUserType($user_type_model);

        return $user_model;
    }

    function fetch_all()
    {
        $repository = new users_repository();
        $entities = $repository->fetch_all();

        $ret = users_factory::construct_from_entities($entities);

        return $ret;
    }

    function save($model)
    {
        $repository = new users_repository();
        $ret = $repository->save($model);

        return $ret;
    }

    function save_all(array $models)
    {
        $ret = [];
        $repository = new users_repository();

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