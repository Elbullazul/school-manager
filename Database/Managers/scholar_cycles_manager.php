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
    public function __construct()
    {
        $this->repository = new scholar_cycles_repository();
    }

    function find($model)
    {
        $entity = $this->repository->find('id', $model->getId());
        $ret = scholar_cycles_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_from_level($model)
    {
        $entity = $this->repository->find('id', $model->getCycleId());
        $ret = scholar_cycles_factory::construct_from_entity($entity);

        return $ret;
    }

    function fetch_all()
    {
        $entity = $this->repository->fetch_all();
        $ret = scholar_cycles_factory::construct_from_entities($entity);

        return $ret;
    }

    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

}