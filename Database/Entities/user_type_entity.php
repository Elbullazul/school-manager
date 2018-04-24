<?php

namespace Database\Entities;

class user_type_entity extends entity
{
    private $type_id;
    private $access_level;
    private $type;
    private $description;

    function type_id($_type_id)
    {
        $this->type_id = $_type_id;
    }

    function access_level($_access_level)
    {
        $this->access_level = $_access_level;
    }

    function type($_type)
    {
        $this->type = $_type;
    }

    function description($_description)
    {
        $this->description = $_description;
    }

    function properties()
    {
        return array(
            "type_id" => $this->type_id,
            "access_level" => $this->access_level,
            "type" => $this->type,
            "description" => $this->description
        );
    }
}

?>
