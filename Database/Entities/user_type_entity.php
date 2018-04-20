<?php

namespace Database\Entities;

class user_type_entity extends Entity
{
    private $type_id;
    private $access_level;
    private $type;
    private $description;

    function type_id($_type_id = NULL)
    {
        if (!is_null($_type_id)) {
            $this->type_id = $_type_id;
        }
        return $this->type_id;
    }

    function access_level($_access_level = NULL)
    {
        if (!is_null($_access_level)) {
            $this->access_level = $_access_level;
        }
        return $this->access_level;
    }

    function type($_type = NULL)
    {
        if (!is_null($_type)) {
            $this->type = $_type;
        }
        return $this->type;
    }

    function description($_description = NULL)
    {
        if (!is_null($_description)) {
            $this->description = $_description;
        }
        return $this->description;
    }

    function properties()
    {
        return array(
            "type_id" => $this->type_id,
            "access_level" => $this->access_level,
            "type" => $this->type,
            "description" => $this->description,
            "date_created" => $this->date_created,
            "date_modified" => $this->date_modified,
            "modified_by" => $this->modified_by
        );
    }
}

?>
