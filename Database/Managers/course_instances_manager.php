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

class course_instances_manager extends manager
{
    public function __construct()
    {
        $this->repository = new courses_instances_repository();
    }

    private function search_concatenate($course_instance_entity) {
        $course_instance_model = course_instances_factory::construct_from_entity($course_instance_entity);

        // load course
        $courses_manager = new courses_manager();
        $course_model = $courses_manager->find_from_instance($course_instance_entity);

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
        $course_instance_model->setCourse($course_model);
        $course_instance_model->setDay($day_model);
        $course_instance_model->setPeriod($period_model);
        $course_instance_model->setClass($class_model);

        return $course_instance_model;
    }

    function find($model)
    {
        $course_instance_entity = $this->repository->find('id', $model->getId());
        $course_instance_model = self::search_concatenate($course_instance_entity);

        return $course_instance_model;
    }

    function fetch_all()
    {
        $course_instance_models = [];
        $course_instance_entities = $this->repository->fetch_all();

        foreach ($course_instance_entities as $course_instance_entity) {
            $course_instance_models[] = self::search_concatenate($course_instance_entity);
        }

        return $course_instance_models;
    }

    function fetch_current() {
        $trimesters_manager = new scholar_trimesters_manager();
        $trimester_model = $trimesters_manager->find_current();

        $course_instance_models = [];
        $course_instance_entities = $this->repository->find_all('trimester_id', $trimester_model->getId());

        foreach ($course_instance_entities as $course_instance_entity) {
            $course_instance_models[] = self::search_concatenate($course_instance_entity);
        }

        return $course_instance_models;
    }

    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

}