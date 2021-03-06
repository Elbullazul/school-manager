<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:55
 */

namespace Objects\Models;

use Database\Entities\scholar_level_entity;

class scholar_level_model extends model
{
    private $id;
    private $name;
    private $cycle;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCycle()
    {
        return $this->cycle;
    }

    /**
     * @param mixed $cycle_id
     */
    public function setCycle($cycle)
    {
        $this->cycle = $cycle;
    }

    function to_entity()
    {
        $entity = new  scholar_level_entity();
        $entity->setId($this->id);
        $entity->setName($this->name);
//        $entity->setCycleId($this->cycle_id->getId());

        return $entity;
    }

}