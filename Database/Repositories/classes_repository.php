<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 16:52
 */

namespace Database\Repositories;

use \PDO;
use Database\connection;
use Database\Entities\class_entity;

class classes_repository extends repository
{
    public function __construct()
    {
        $this->table = "classes";
        $this->entity = class_entity::class;
    }

    function find($field, $value)
    {
        $Cnn = connection::getInstance();
        $cmd = "SELECT
              id,
              code,
              description,
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
        $entity = $data->fetch();

        if (!$entity) {   // query returned NULL
            $entity = new $this->entity();
        }

        return $entity;
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