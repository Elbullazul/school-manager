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
    function find($model)
    {
        $repository = new scholar_years_repository();
        $entity = $repository->find('id', $model->getId());

        $ret = scholar_years_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_current() {
        $repository = new scholar_years_repository();
        $entity = $repository->find_current();

        $ret = scholar_years_factory::construct_from_entity($entity);

        return $ret;
    }

    function fetch_all()
    {
        $repository = new scholar_years_repository();
        $entities = $repository->fetch_all();

        $ret = scholar_years_factory::construct_from_entities($entities);

        return $ret;
    }

    function save($model)
    {
        $repository = new scholar_years_repository();
        $ret = $repository->save($model);

        return $ret;
    }

    function save_all(array $models)
    {
        $ret = [];
        $repository = new scholar_years_repository();

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
        $repository = new scholar_years_repository();
        $ret = $repository->destroy('id', $model->getId());

        return $ret;
    }

    function destroy_all()
    {
        $repository = new scholar_years_repository();
        $ret = $repository->destroy_all();

        return $ret;
    }

}