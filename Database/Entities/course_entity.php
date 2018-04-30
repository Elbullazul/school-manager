<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 10:30
 */

namespace Database\Entities;

use Objects\Models\course_model;

class course_entity extends entity
{
    private $id;
    private $code;
    private $name;
    private $level_id;

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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
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
    public function getLevelId()
    {
        return $this->level_id;
    }

    /**
     * @param mixed $level_id
     */
    public function setLevelId($level_id)
    {
        $this->level_id = $level_id;
    }

    function to_model()
    {
        $model = new course_model();
        $model->setId($this->id);
        $model->setName($this->name);
        $model->setCode($this->code);
        // TODO: Set Level from manager
//        $model->setLevelId($this->level_id);

        return $model;
    }

}