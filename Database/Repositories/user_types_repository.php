<?php

namespace Database\Repositories;

use \PDO;
use Database\connection;
use Database\Entities\user_type_entity;

class user_types_repository extends repository
{
    public function __construct()
    {
        $this->table = "user_types";
        $this->entity = user_type_entity::class;
    }

    function find($field, $value)
    {
        $Cnn = connection::getInstance();
        $cmd = "SELECT
              type_id,
              access_level,
              type,
              description,
              -- entity fields
              modified_by,
              date_created,
              date_modified
            FROM $this->table
            WHERE $this->table.$field = :$field";

        $user_data = $Cnn->prepare($cmd);

        $user_data->bindValue($field, $value, PDO::PARAM_STR);
        $user_data->setFetchMode(PDO::FETCH_CLASS, $this->entity, array());
        $user_data->execute();
        $user_type = $user_data->fetch();

        if (!$user_type) {
            $user_type = new $this->entity();
        }

        return $user_type;
    }

    function save($_model)
    {
        return false;
    }

    function update($_model, $_new_model)
    {
        return false;
    }

    function destroy($_model)
    {
        return false;
    }
}


?>
