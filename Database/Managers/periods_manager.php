<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-02
 * Time: 10:10
 */

namespace Database\Managers;

use Objects\Factories\periods_factory;
use Database\Repositories\periods_repository;

class periods_manager extends manager
{
    public function __construct()
    {
        $this->repository = new periods_repository();
    }

    function find($model)
    {
        $entity = $this->repository->find('id', $model->getId());
        $ret = periods_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_from_course_instance($model)
    {
        $entity = $this->repository->find('id', $model->getDayId());
        $ret = periods_factory::construct_from_entity($entity);

        return $ret;
    }

    function fetch_all()
    {
        $entities = $this->repository->fetch_all();
        $ret = periods_factory::construct_from_entities($entities);

        return $ret;
    }

    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

}