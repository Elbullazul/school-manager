<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 10:41
 */

namespace Database\Managers;

use Objects\Factories\course_competences_factory;
use Database\Repositories\course_competences_repository;

class course_competences_manager extends manager
{
    public function __construct()
    {
        $this->repository = new course_competences_repository();
    }

    function find($model)
    {
        $entity = $this->repository->find('course_id', $model->getId());
        $ret = course_competences_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_all($model)
    {
        $entities = $this->repository->find_all('course_id', $model->getId());
        $ret = course_competences_factory::construct_from_entities($entities);

        return $ret;
    }

    function fetch_all()
    {
        $entities = $this->repository->fetch_all();
        $ret = course_competences_factory::construct_from_entities($entities);

        return $ret;
    }

    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

    function destroy($model)
    {
        $ret = $this->repository->destroy('course_id', $model->getId());

        return $ret;
    }

}