<?php

namespace Database\Entities;

use Objects\Models\user_model;

class user_entity extends entity
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
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
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

    function to_model()
    {
        $model = new user_model();
        $model->setUserId($this->user_id);
        $model->setPassword($this->password);
        $model->setUsername($this->username);
        $model->setUserType($this->user_type);

        return $model;
    }
}