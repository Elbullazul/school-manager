<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-02
 * Time: 09:55
 */

namespace Database\Managers;

use Objects\Factories\days_factory;
use Database\Repositories\days_repository;

class days_manager extends manager
{
    public function __construct()
    {
        $this->repository = new days_repository();
    }

    function find($model)
    {
        $entity = $this->repository->find('id', $model->getId());
        $ret = days_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_from_course_instance($model)
    {
        $entity = $this->repository->find('id', $model->getDayId());
        $ret = days_factory::construct_from_entity($entity);

        return $ret;
    }

    function fetch_all()
    {
        $entities = $this->repository->fetch_all();
        $ret = days_factory::construct_from_entities($entities);

        return $ret;
    }

    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

}