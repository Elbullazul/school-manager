<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-02
 * Time: 10:37
 */

namespace Database\Managers;

use Objects\Factories\scholar_years_factory;
use Database\Repositories\scholar_years_repository;

class scholar_years_manager extends manager
{
    public function __construct()
    {
        $this->repository = new scholar_years_repository();
    }

    function find($model)
    {
        $entity = $this->repository->find('id', $model->getId());
        $ret = scholar_years_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_current() {
        $entity = $this->repository->find_current();
        $ret = scholar_years_factory::construct_from_entity($entity);

        return $ret;
    }

    function exists($model) {
        $ret = $this->repository->find('id', $model->getId());

        return $ret;
    }

    function fetch_all()
    {
        $entities = $this->repository->fetch_all();
        $ret = scholar_years_factory::construct_from_entities($entities);

        return $ret;
    }

    function fetch_all_newer_first() {
        $entities = $this->repository->fetch_all_newer_first();
        $ret = scholar_years_factory::construct_from_entities($entities);

        return $ret;
    }
    
    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

}