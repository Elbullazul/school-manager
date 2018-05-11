<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-01
 * Time: 10:50
 */

namespace Database\Managers;

use Database\Repositories\classes_repository;
use Objects\Factories\classes_factory;

class classes_manager extends manager
{
    public function __construct()
    {
        $this->repository = new classes_repository();
    }

    function find($model)
    {
        $entity = $this->repository->find('id', $model->getId());
        $ret = classes_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_from_course_instance($model)
    {
        $entity = $this->repository->find('id', $model->getClassId());
        $ret = classes_factory::construct_from_entity($entity);

        return $ret;
    }

    function fetch_all()
    {
        $entity = $this->repository->fetch_all();
        $ret = classes_factory::construct_from_entities($entity);

        return $ret;
    }

    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

}