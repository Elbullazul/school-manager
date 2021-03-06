<?php

namespace Database\Entities;

use Objects\Models\user_type_model;

class user_type_entity extends entity
{
    private $type_id;
    private $access_level;
    private $type;
    private $description;

    /**
     * @return mixed
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * @param mixed $type_id
     */
    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;
    }

    /**
     * @return mixed
     */
    public function getAccessLevel()
    {
        return $this->access_level;
    }

    /**
     * @param mixed $access_level
     */
    public function setAccessLevel($access_level)
    {
        $this->access_level = $access_level;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    function to_model()
    {
        $model = new user_type_model();
        $model->setType($this->type);
        $model->setTypeId($this->type_id);
        $model->setDescription($this->description);
        $model->setAccessLevel($this->access_level);

        return $model;
    }
}