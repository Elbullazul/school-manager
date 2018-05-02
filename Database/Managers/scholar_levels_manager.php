<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 08:20
 */

namespace Database\Managers;

use Objects\Factories\scholar_levels_factory;
use Database\Repositories\scholar_levels_repository;

class scholar_levels_manager extends manager
{
    function find($model)
    {
        $level_repository = new scholar_levels_repository();
        $level_entity = $level_repository->find('id', $model->getId());

        $cycles_manager = new scholar_cycles_manager();
        $cycle_model = $cycles_manager->find_from_level($level_entity);

        $level_model = scholar_levels_factory::construct_from_entity($level_entity);
        $level_model->setCycle($cycle_model);

        return $level_model;
    }

    function find_from_course($model)
    {
        $level_repository = new scholar_levels_repository();
        $level_entity = $level_repository->find('id', $model->getLevelId());

        $cycles_manager = new scholar_cycles_manager();
        $cycle_model = $cycles_manager->find_from_level($level_entity);

        $level_model = scholar_levels_factory::construct_from_entity($level_entity);
        $level_model->setCycle($cycle_model);

        return $level_model;
    }

    // TODO: Remove if invalid or restore if OK
//    function find_all($model)
//    {
//        $level_repository = new scholar_levels_repository();
//        $cycles_manager = new scholar_cycles_manager();
//
//        $level_models = [];
//        $level_entities = $level_repository->find_all('id', $model->getId());
//
//        foreach ($level_entities as $level_entity) {
//            $cycle_model = $cycles_manager->find_from_level($level_entity);
//
//            $level_model = scholar_levels_factory::construct_from_entity($level_entity);
//            $level_model->setCycle($cycle_model);
//
//            $level_models[] = $level_model;
//        }
//
//        return $level_models;
//    }

    function fetch_all()
    {
        $level_repository = new scholar_levels_repository();
        $cycles_manager = new scholar_cycles_manager();

        $level_models = [];
        $level_entities = $level_repository->fetch_all();

        foreach ($level_entities as $level_entity) {
            $cycle_model = $cycles_manager->find_from_level($level_entity);

            $level_model = scholar_levels_factory::construct_from_entity($level_entity);
            $level_model->setCycle($cycle_model);

            $level_models[] = $level_model;
        }

        return $level_models;
    }

    function save($model)
    {
        $repository = new scholar_levels_repository();
        $ret = $repository->save($model);

        return $ret;
    }

    function save_all(array $models)
    {
        $ret = [];
        $repository = new scholar_levels_repository();

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
        $repository = new scholar_levels_repository();
        $ret = $repository->destroy('id', $model->getId());

        return $ret;
    }

    function destroy_all()
    {
        $repository = new scholar_levels_repository();
        $ret = $repository->destroy_all();

        return $ret;
    }

}