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
    public function __construct()
    {
        $this->repository = new scholar_levels_repository();
    }

    function find($model)
    {
        $level_entity = $this->repository->find('id', $model->getId());

        $cycles_manager = new scholar_cycles_manager();
        $cycle_model = $cycles_manager->find_from_level($level_entity);

        $level_model = scholar_levels_factory::construct_from_entity($level_entity);
        $level_model->setCycle($cycle_model);

        return $level_model;
    }

    function find_from_course($model)
    {
        $level_entity = $this->repository->find('id', $model->getLevelId());

        $cycles_manager = new scholar_cycles_manager();
        $cycle_model = $cycles_manager->find_from_level($level_entity);

        $level_model = scholar_levels_factory::construct_from_entity($level_entity);
        $level_model->setCycle($cycle_model);

        return $level_model;
    }

    function fetch_all()
    {
        $cycles_manager = new scholar_cycles_manager();

        $level_models = [];
        $level_entities = $this->repository->fetch_all();

        foreach ($level_entities as $level_entity) {
            $cycle_model = $cycles_manager->find_from_level($level_entity);

            $level_model = scholar_levels_factory::construct_from_entity($level_entity);
            $level_model->setCycle($cycle_model);

            $level_models[] = $level_model;
        }

        return $level_models;
    }


    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

}