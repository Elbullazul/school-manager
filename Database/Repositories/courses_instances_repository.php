<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:26
 */

namespace Database\Repositories;

use \PDO;
use Database\connection;
use Database\Entities\course_instance_entity;

class courses_instances_repository extends repository
{
    public function __construct()
    {
        $this->table = "courses_instances";
        $this->entity = course_instance_entity::class;
    }

    function find($field, $value)
    {
        $Cnn = connection::getInstance();
        $cmd = "SELECT
              id,
              trimester_id,
              course_id,
              teacher_id,
              period_id,
              day_id,
              class_id,
              -- entity fields
              modified_by,
              date_created,
              date_modified
            FROM $this->table
            WHERE $this->table.$field = :$field";

        $data = $Cnn->prepare($cmd);

        $data->bindValue($field, $value, PDO::PARAM_STR);
        $data->setFetchMode(PDO::FETCH_CLASS, $this->entity, array());
        $data->execute();
        $instance = $data->fetch();

        if (!$instance) {
            $instance = new $this->entity();
        }

        return $instance;
    }

    function find_current($trimester_id) {
        $Cnn = connection::getInstance();
        $cmd = "SELECT
              id,
              trimester_id,
              course_id,
              teacher_id,
              period_id,
              day_id,
              class_id,
              -- entity fields
              modified_by,
              date_created,
              date_modified
            FROM $this->table
            WHERE $this->table.trimester_id = :trimester_id";

        $data = $Cnn->prepare($cmd);

        $data->bindValue('trimester_id', $trimester_id, PDO::PARAM_STR);
        $data->setFetchMode(PDO::FETCH_CLASS, $this->entity, array());
        $data->execute();
        $instance = $data->fetch();

        if (!$instance) {
            $instance = new $this->entity();
        }

        return $instance;
    }

    function save($_model)
    {
        // TODO: Implement save() method.
    }

    function update($_model, $_new_model)
    {
        // TODO: Implement update() method.
    }

    function destroy($_model)
    {
        // TODO: Implement destroy() method.
    }

}