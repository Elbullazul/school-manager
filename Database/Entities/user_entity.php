<?php

namespace Database\Entities;

class user_entity extends entity
{
    private $user_id;
    private $username;
    private $user_type;
    private $password;

    function user_id($_user_id)
    {
        $this->user_id = $_user_id;
    }

    function username($_username)
    {
        $this->username = $_username;
    }

    function user_type($_user_type)
    {
        $this->user_type = $_user_type;
    }

    function password($_password)
    {
        $this->password = $_password;
    }

    function properties()
    {
        return array(
            "user_id" => $this->user_id,
            "username" => $this->username,
            "user_type" => $this->user_type,
            "password" => $this->password
        );
    }
}

?>
