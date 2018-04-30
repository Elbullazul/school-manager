<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:51
 */

namespace Objects\Models;


use Database\Entities\scholar_cycle_entity;

class scholar_cycle_model extends model
{
    private $id;
    private $name;

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

    function to_entity()
    {
        $entity = new scholar_cycle_entity();
        $entity->setId($this->id);
        $entity->setName($this->name);

        return $entity;
    }
}