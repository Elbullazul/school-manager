<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-26
 * Time: 20:52
 */

namespace Database\Repositories;

use Database\Entities\competence_entity;

class competences_repository extends repository
{
    public function __construct()
    {
        $this->table = "competences";
        $this->entity = competence_entity::class;
    }

    function find($field, $value)
    {
        $Cnn = connection::getInstance();
        $cmd = "SELECT
              id,
              name,
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

        if (!$entity) {
            $entity = new $this->entity();
        }

        return $entity;
    }

    function save($_model)
    {
        // return ID
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