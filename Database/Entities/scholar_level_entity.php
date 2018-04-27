<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:55
 */

namespace Database\Entities;


class scholar_level_entity extends entity
{
    private $id;
    private $name;
    private $cycle_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
    public function getCycleId()
    {
        return $this->cycle_id;
    }

    /**
     * @param mixed $cycle_id
     */
    public function setCycleId($cycle_id)
    {
        $this->cycle_id = $cycle_id;
    }

}