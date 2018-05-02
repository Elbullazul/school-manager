<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:55
 */

namespace Database\Entities;


use Objects\Models\scholar_level_model;

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

    function to_model()
    {
        $model = new  scholar_level_model();
        $model->setId($this->id);
        $model->setName($this->name);
//        $model->setCycleId($this->cycle_id);

        return $model;
    }

}