<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-04
 * Time: 11:17
 */

namespace Database\Managers;

use Objects\Factories\persons_factory;
use Objects\Factories\teachers_factory;
use Database\Repositories\teachers_repository;

class teachers_manager extends manager
{
    public function __construct()
    {
        $this->repository = new teachers_repository();
    }

    function find($model)
    {
        $entity = $this->repository->find('id', $model->getId());
        $student_model = teachers_factory::construct_from_entity($entity);

        // load person data
        $person_manager = new persons_manager();
        $person_model = $person_manager->find($student_model->getPersonId());

        persons_factory::fill_model($student_model, $person_model);

        return $student_model;
    }

    // TODO: Check & test ASAP
    function fetch_all()
    {
        $entities = $this->repository->fetch_all();
        $teachers_models = teachers_factory::construct_from_entities($entities);

        // load person data
        $person_manager = new persons_manager();

        foreach ($teachers_models as $student_model) {
            $person_model = $person_manager->find_from_child_model($student_model);
            persons_factory::fill_model($student_model, $person_model);
        }

        return $teachers_models;
    }

    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

}