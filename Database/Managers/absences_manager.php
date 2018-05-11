<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-07
 * Time: 15:04
 */

namespace Database\Managers;

use Objects\Factories\absences_factory;
use Database\Repositories\absences_repository;

class absences_manager extends manager
{
    public function __construct()
    {
        $this->repository = new absences_repository();
    }

    function find($model)
    {
        $entity = $this->repository->find('id', $model->getId());
        $ret = absences_factory::construct_from_entity($entity);

        return $ret;
    }

    function fetch_all()
    {
        $entities = $this->repository->fetch_all();
        $ret = absences_factory::construct_from_entities($entities);

        return $ret;
    }

    function update($unique_id, $model)
    {
        // TODO: Implement update() method.
    }

}