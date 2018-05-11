<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-11
 * Time: 10:55
 */

namespace Database\Managers;

use Objects\Factories\evaluations_factory;
use Database\Repositories\evaluations_repository;

class evaluations_manager extends manager
{
    public function __construct()
    {
        $this->repository = new evaluations_repository();
    }

    function find($model)
    {
        $entity = $this->repository->find('id', $model->getId());
        $ret = evaluations_factory::construct_from_entity($entity);

        return $ret;
    }

    function fetch_all()
    {
        $entities = $this->repository->fetch_all();
        $ret = evaluations_factory::construct_from_entities($entities);

        return $ret;
    }

    function save_get_last_id($model) {
        self::save($model);

        return $this->repository->get_last_id();
    }

    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

}