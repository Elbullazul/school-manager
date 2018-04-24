<?php

namespace Database\Repositories;

use \PDO;
use Database\connection;
use Database\Entities\user_entity;

class users_repository extends repository
{
    public function __construct()
    {
        $this->table = "users";
        $this->entity = user_entity::class;
    }

    function find($field, $value)
    {
        $Cnn = connection::getInstance();
        $cmd = "SELECT
              user_id,
              username,
              type_id as user_type,
              password,
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
        $user = $user_data->fetch();

        if (!$user) {
            $user = new $this->entity();
        }

        return $user;
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
