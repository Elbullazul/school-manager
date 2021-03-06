<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:09
 */

namespace Database\Entities;


use Objects\Models\period_model;

class period_entity extends entity
{
    private $id;
    private $begins;
    private $ends;

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
    public function getBegins()
    {
        return $this->begins;
    }

    /**
     * @param mixed $begins
     */
    public function setBegins($begins)
    {
        $this->begins = $begins;
    }

    /**
     * @return mixed
     */
    public function getEnds()
    {
        return $this->ends;
    }

    /**
     * @param mixed $ends
     */
    public function setEnds($ends)
    {
        $this->ends = $ends;
    }

    function to_model()
    {
        $model = new period_model();
        $model->setId($this->id);
        $model->setBegins($this->begins);
        $model->setEnds($this->ends);

        return $model;
    }
}