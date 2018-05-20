<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-04
 * Time: 10:50
 */

namespace Database\Managers;

use Objects\Factories\persons_factory;
use Database\Repositories\persons_repository;

class persons_manager extends manager
{
    public function __construct()
    {
        $this->repository = new persons_repository();
    }

    function find($model)
    {
        $entity = $this->repository->find('id', $model->getId());
        $ret = persons_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_by_id($id) {
        $entity = $this->repository->find('id', $id);
        $ret = persons_factory::construct_from_entity($entity);

        return $ret;
    }

    function find_from_child_model($model) {
        $entity = $this->repository->find('id', $model->getPersonId());
        $ret = persons_factory::construct_from_entity($entity);

        return $ret;
    }

    function fetch_all()
    {
        $entities = $this->repository->fetch_all();
        $ret = persons_factory::construct_from_entities($entities);

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