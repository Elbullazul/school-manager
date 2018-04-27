<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-27
 * Time: 09:25
 */

namespace Database\Repositories;

use Database\Entities\competence_ponderation_entity;

class competence_ponderations_repository extends repository
{
    public function __construct()
    {
        $this->table = "competences_ponderations";
        $this->entity = competence_ponderation_entity::class;
    }

    function find($field, $value)
    {
        $Cnn = connection::getInstance();
        $cmd = "SELECT
              competence_id,
              trimester_rank,
              ponderation,
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