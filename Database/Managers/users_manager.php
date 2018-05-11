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
    public function __construct()
    {
        $this->repository = new users_repository();
    }

    function find($model)
    {
        $user_entity = $this->repository->find('user_id', $model->getUserId());

        $user_types_manager = new user_types_manager();
        $user_type_model = $user_types_manager->find_from_user($user_entity);

        $user_model = users_factory::construct_from_entity($user_entity);
        $user_model->setUserType($user_type_model);

        return $user_model;
    }

    function find_by_username($model)
    {
        $user_entity = $this->repository->find('username', $model->getUsername());

        // TODO: concat user type
        $user_types_manager = new user_types_manager();
        $user_type_model = $user_types_manager->find_from_user($user_entity);

        $user_model = users_factory::construct_from_entity($user_entity);
        $user_model->setUserType($user_type_model);

        return $user_model;
    }

    function fetch_all()
    {
        $entities = $this->repository->fetch_all();
        $ret = users_factory::construct_from_entities($entities);

        return $ret;
    }
    
    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

    function destroy($model)
    {
        $ret = $this->repository->destroy('user_id', $model->getId());

        return $ret;
    }

}