<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:38
 */

namespace Database\Entities;

use Objects\Models\scholar_trimester_model;

class scholar_trimester_entity extends entity
{
    private $id;
    private $begins;
    private $ends;
    private $name;
    private $rank;
    private $scholar_year_id;

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
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @param mixed $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    /**
     * @return mixed
     */
    public function getScholarYearId()
    {
        return $this->scholar_year_id;
    }

    /**
     * @param mixed $scholar_year_id
     */
    public function setScholarYearId($scholar_year_id)
    {
        $this->scholar_year_id = $scholar_year_id;
    }

    function to_model()
    {
        $model = new scholar_trimester_model();
        $model->setId($this->id);
        $model->setBegins($this->begins);
        $model->setEnds($this->ends);
        $model->setName($this->name);
        $model->setRank($this->rank);
        $model->setScholarYearId($this->scholar_year_id);

        return $model;
    }

}