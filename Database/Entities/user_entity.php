<?php

namespace Database\Entities;

class user_entity extends Entity
{

    private $user_id;
    private $username;
    private $user_type;
    private $password;

    function user_id($_user_id = NULL)
    {
        if (!is_null($_user_id)) {
            $this->user_id = $_user_id;
        }
        return $this->user_id;
    }

    function username($_username = NULL)
    {
        if (!is_null($_username)) {
            $this->username = $_username;
        }
        return $this->username;
    }

    function user_type($_user_type = NULL)
    {
        if (!is_null($_user_type)) {
            $this->user_type = $_user_type;
        }
        return $this->user_type;
    }

    function password($_password = NULL)
    {
        if (!is_null($_password)) {
            $this->password = $_password;
        }
        return $this->password;
    }

    function properties()
    {
        return array(
            "user_id" => $this->user_id,
            "username" => $this->username,
            "user_type" => $this->user_type,
            "password" => $this->password,
            "date_created" => $this->date_created,
            "date_modified" => $this->date_modified,
            "modified_by" => $this->modified_by
        );
    }
}

?>
