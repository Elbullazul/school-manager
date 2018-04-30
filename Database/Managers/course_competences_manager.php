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
    function find($model)
    {
        $repository = new course_competences_repository();
        $entity = $repository->find('course_id', $model->getId());

        $ret = course_competences_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_all($model)
    {
        $repository = new course_competences_repository();
        $entities = $repository->find_all('course_id', $model->getId());

        $ret = course_competences_factory::construct_from_entities($entities);

        return $ret;
    }

    function fetch_all()
    {
        $repository = new course_competences_repository();
        $entities = $repository->fetch_all();

        $ret = course_competences_factory::construct_from_entities($entities);

        return $ret;
    }

    function save($model)
    {
        $repository = new course_competences_repository();
        $ret = $repository->save($model);

        return $ret;
    }

    function save_all(array $models)
    {
        $ret = [];
        $repository = new course_competences_repository();

        foreach ($models as $model) {
            $ret[] = $repository->save($model);
        }

        return $ret;
    }

    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

    function destroy($model)
    {
        $repository = new course_competences_repository();
        $ret = $repository->destroy('course_id', $model->getId());

        return $ret;
    }

    function destroy_all()
    {
        $repository = new course_competences_repository();
        $ret = $repository->destroy_all();

        return $ret;
    }

}