<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-02
 * Time: 09:44
 */

namespace Database\Managers;

use Objects\Factories\course_instances_factory;
use Database\Repositories\courses_instances_repository;
use Services\date;

class course_instances_manager extends manager
{
    private function search_concatenate($course_instance_entity) {
        $course_instance_model = course_instances_factory::construct_from_entity($course_instance_entity);

        // load day
        $days_manager = new days_manager();
        $day_model = $days_manager->find_from_course_instance($course_instance_entity);

        // load period
        $periods_manager = new periods_manager();
        $period_model = $periods_manager->find_from_course_instance($course_instance_entity);

        // load class
        $classes_manager = new classes_manager();
        $class_model = $classes_manager->find_from_course_instance($course_instance_entity);

        // assemble final model
        $course_instance_model->setDay($day_model);
        $course_instance_model->setPeriod($period_model);
        $course_instance_model->setClass($class_model);

        return $course_instance_model;
    }

    // TODO: Implement concat of data
    function find($model)
    {
        $course_instance_repository = new courses_instances_repository();
        $course_instance_entity = $course_instance_repository->find('id', $model->getId());

        $course_instance_model = self::search_concatenate($course_instance_entity);

        return $course_instance_model;
    }

    function fetch_all()
    {
        $course_instance_repository = new courses_instances_repository();
        $course_instance_entities = $course_instance_repository->fetch_all();

        $course_instance_models = [];

        foreach ($course_instance_entities as $course_instance_entity) {
            $course_instance_models[] = self::search_concatenate($course_instance_entity);
        }

        return $course_instance_models;
    }

    function fetch_current() {
        $trimesters_manager = new scholar_trimesters_manager();
        $trimester_model = $trimesters_manager->find_current();

        $course_instance_repository = new courses_instances_repository();
        $course_instance_entities = $course_instance_repository->find_all('trimester_id', $trimester_model->getId());

        $course_instance_models = [];

        foreach ($course_instance_entities as $course_instance_entity) {
            $course_instance_models[] = self::search_concatenate($course_instance_entity);
        }

        return $course_instance_models;
    }

    function save($model)
    {
        $repository = new courses_instances_repository();
        $ret = $repository->save($model);

        return $ret;
    }

    function save_all(array $models)
    {
        $ret = [];
        $repository = new courses_instances_repository();

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
        $repository = new courses_instances_repository();
        $ret = $repository->destroy('id', $model->getId());

        return $ret;
    }

    function destroy_all()
    {
        $repository = new courses_instances_repository();
        $ret = $repository->destroy_all();

        return $ret;
    }

}