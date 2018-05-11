<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-07
 * Time: 14:25
 */

namespace Database\Managers;

use Objects\Factories\courses_registrations_factory;
use Database\Repositories\courses_registrations_repository;

class courses_registrations_manager extends manager
{
    public function __construct()
    {
        $this->repository = new courses_registrations_repository();
    }

    function find($model) {
        return NULL;
    }

    function find_from_student($model)
    {
        $entity = $this->repository->find('student_id', $model->getId());
        $ret = courses_registrations_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_from_course_instance($model)
    {
        $entity = $this->repository->find('course_instance_id', $model->getId());
        $ret = courses_registrations_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_all_from_course_instance($model)
    {
        $entity = $this->repository->find_all('course_instance_id', $model->getId());
        $ret = courses_registrations_factory::construct_from_entities($entity);

        return $ret;
    }

    function fetch_all()
    {
        $entities = $this->repository->fetch_all();
        $ret = courses_registrations_factory::construct_from_entities($entities);

        return $ret;
    }

    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

}