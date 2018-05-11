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
    public function __construct()
    {
        $this->repository = new competences_repository();
    }

    function find($model)
    {
        $entity = $this->repository->find('id', $model->getId());
        $ret = competences_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_from_course_competence($model)
    {
        $entity = $this->repository->find('id', $model->getCompetenceId());
        $ret = competences_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_all_from_course_competence($model)
    {
        $entities = $this->repository->find_all('id', $model->getCompetenceId());
        $ret = competences_factory::construct_from_entities($entities);

        return $ret;
    }

    function fetch_all()
    {
        $entities = $this->repository->fetch_all();
        $ret = competences_factory::construct_from_entities($entities);

        return $ret;
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