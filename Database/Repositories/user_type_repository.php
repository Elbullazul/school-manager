<?php

namespace Database\Repositories;

use \PDO;
use Database\connection;
use Database\Entities\user_type_entity;

class user_type_repository extends repository
{
    function find_by_id($_type_id)
    {
        $Cnn = connection::getInstance();
        $cmd = 'SELECT
              type_id,
              access_level,
              type,
              description,
              modified_by,
              date_created,
              date_modified
            FROM user_types
            WHERE user_types.type_id = :type_id';

        $user_data = $Cnn->prepare($cmd);

        $user_data->bindValue('type_id', $_type_id, PDO::PARAM_STR);
        $user_data->setFetchMode(PDO::FETCH_CLASS, $this->entity, array());
        $user_data->execute();
        $user_type = $user_data->fetch();

        if (!$user_type) {   // query returned NULL
            $user_type = new user_entity();
        }

        return $user_type;
    }

    function save($_model)
    {

    }

    function update($_model, $_new_model)
    {

    }

    function destroy($_model)
    {

    }

    protected function entity() {
        $this->entity = user_type_entity::class;
    }
}


?>
