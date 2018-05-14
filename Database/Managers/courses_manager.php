<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 09:05
 */

namespace Database\Managers;

use const Core\ROOT;
use Objects\Factories\courses_factory;
use Database\Repositories\courses_repository;

class courses_manager extends manager
{
    public function __construct()
    {
        $this->repository = new courses_repository();
    }

    protected function search_concatenate($course_entity)
    {
        $course_model = courses_factory::construct_from_entity($course_entity);

        // load course level
        $scholar_levels_manager = new scholar_levels_manager();
        $level_model = $scholar_levels_manager->find_from_course($course_entity);

        // load all competences associated with course
        $course_competences_manager = new course_competences_manager();
        $course_competence_models = $course_competences_manager->find_all($course_entity);

        $competences_manager = new competences_manager();
        $competence_ponderations_manager = new competence_ponderations_manager();

        $competence_models = [];

        foreach ($course_competence_models as $course_competence_model) {

            // load competences links to course
            $competence_model = $competences_manager->find_from_course_competence($course_competence_model);
            $competence_ponderations_models = $competence_ponderations_manager->find_all_from_competence($competence_model);

            $competence_model->setPonderations($competence_ponderations_models);
            $competence_models[] = $competence_model;
        }

        // assemble final model
        $course_model->setLevel($level_model);
        $course_model->setCompetences($competence_models);

        return $course_model;
    }

    function find($model)
    {
        $course_entity = $this->repository->find('À', $model->getId());
        $course_model = self::search_concatenate($course_entity);

        return $course_model;
    }

    function find_from_instance($model) {
        $course_entity = $this->repository->find('id', $model->getCourseId());
        $course_model = self::search_concatenate($course_entity);

        return $course_model;
    }

    function exists($model) {
        $ret = $this->repository->find('code', $model->getCode());

        return $ret;
    }

    function fetch_all()
    {
        $course_models = [];
        $course_entities = $this->repository->fetch_all();

        foreach ($course_entities as $course_entity) {
            $course_models[] = self::search_concatenate($course_entity);
        }

        return $course_models;
    }

    function save_get_id($model)
    {
        self::save($model);

        return $this->repository->get_last_id();
    }

    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

}