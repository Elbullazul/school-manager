<?php

namespace Objects\Models;

use Database\Entities\user_entity;

class user_model extends model
{
    private $user_id;
    private $username;
    private $user_type;
    private $password;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->user_type;
    }

    /**
     * @param mixed $user_type
     */
    public function setUserType($user_type)
    {
        $this->user_type = $user_type;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    function to_entity()
    {
        $entity = new user_entity();
        $entity->setUserId($this->user_id);
        $entity->setPassword($this->password);
        $entity->setUsername($this->username);
        $entity->setUserType($this->user_type);

        return $entity;
    }
}