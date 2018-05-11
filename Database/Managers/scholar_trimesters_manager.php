<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-29
 * Time: 18:35
 */

namespace Database\Managers;

use Objects\Factories\scholar_trimesters_factory;
use Database\Repositories\scholar_trimesters_repository;

class scholar_trimesters_manager extends manager
{
    public function __construct()
    {
        $this->repository = new scholar_trimesters_repository();
    }

    function find($model)
    {
        $entity = $this->repository->find('id', $model->getId());
        $ret = scholar_trimesters_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_current()
    {
        $entity = $this->repository->find_current();
        $ret = scholar_trimesters_factory::construct_from_entity($entity);

        return $ret;
    }

    function exists($model) {
        $ret = $this->repository->find('id', $model->getId());

        return $ret;
    }

    function fetch_all()
    {
        $entities = $this->repository->fetch_all();
        $ret = scholar_trimesters_factory::construct_from_entities($entities);

        return $ret;
    }

    function fetch_current_and_future() {
        $entities = $this->repository->find_current_and_future();

        if (!is_array($entities))
            $entities = [$entities];
        $ret = scholar_trimesters_factory::construct_from_entities($entities);

        return $ret;
    }

    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }
    
}