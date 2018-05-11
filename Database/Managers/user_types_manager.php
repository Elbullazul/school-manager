<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 12:43
 */

namespace Database\Managers;

use Objects\Factories\user_types_factory;
use Database\Repositories\user_types_repository;

class user_types_manager extends manager
{
    public function __construct()
    {
        $this->repository = new user_types_repository();
    }

    function find($model)
    {
        $entity = $this->repository->find('type_id', $model->getTypeId());
        $ret = user_types_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_from_user($model)
    {
        $entity = $this->repository->find('type_id', $model->getUserType());
        $ret = user_types_factory::construct_from_entity($entity);

        return $ret;
    }

    function fetch_all()
    {
        $entity = $this->repository->fetch_all();
        $ret = user_types_factory::construct_from_entities($entity);

        return $ret;
    }

    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

    function destroy($model)
    {
        $ret = $this->repository->destroy('type_id', $model->getTypeId());

        return $ret;
    }

}