<?php

namespace Objects\Models;

use Database\Entities\user_type_entity;

class user_type_model extends model
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

    function to_entity()
    {
        $entity = new user_type_entity();
        $entity->setType($this->type);
        $entity->setTypeId($this->type_id);
        $entity->setDescription($this->description);
        $entity->setAccessLevel($this->access_level);

        return $entity;
    }

}