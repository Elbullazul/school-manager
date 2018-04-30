<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:51
 */

namespace Database\Entities;


use Objects\Models\scholar_cycle_model;

class scholar_cycle_entity extends entity
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

    function to_model()
    {
        $model = new scholar_cycle_model();
        $model->setId($this->id);
        $model->setName($this->name);

        return $model;
    }

}