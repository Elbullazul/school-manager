<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 11:09
 */

namespace Database\Managers;

use Objects\Factories\competences_factory;
use Database\Repositories\competences_repository;

class competences_manager extends manager
{
    function find($model)
    {
        $repository = new competences_repository();
        $entity = $repository->find('id', $model->getId());

        $ret = competences_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_from_course_competence($model)
    {
        $repository = new competences_repository();
        $entity = $repository->find('id', $model->getCompetenceId());

        $ret = competences_factory::construct_from_entity($entity);

        return $ret;
    }

    // TODO: Remove if invalid or restore if OK
//    function find_all($model)
//    {
//        $repository = new competences_repository();
//        $entity = $repository->find_all('id', $model->getId());
//
//        $ret = competences_factory::construct_from_entities($entity);
//
//        return $ret;
//    }

    function find_all_from_course_competence($model)
    {
        $repository = new competences_repository();
        $entity = $repository->find_all('id', $model->getCompetenceId());

        $ret = competences_factory::construct_from_entities($entity);

        return $ret;
    }

    function fetch_all()
    {
        $repository = new competences_repository();
        $entities = $repository->fetch_all();

        $ret = competences_factory::construct_from_entities($entities);

        return $ret;
    }

    function save($model)
    {
        $repository = new competences_repository();
        $ret = $repository->save($model);

        return $ret;
    }

    function save_get_id($model) {
        self::save($model);
        $repository = new competences_repository();

        return $repository->get_last_id();
    }

    function save_all(array $models)
    {
        $ret = [];
        $repository = new competences_repository();

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
        $repository = new competences_repository();
        $ret = $repository->destroy('id', $model->getCompetenceId());

        return $ret;
    }

    function destroy_all()
    {
        $repository = new competences_repository();
        $ret = $repository->destroy_all();

        return $ret;
    }

}