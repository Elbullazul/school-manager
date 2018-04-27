<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:38
 */

namespace Database\Entities;


class scholar_trimester_entity extends entity
{
    private $id;
    private $begins;
    private $ends;
    private $name;
    private $trimester_rank;
    private $scholar_year_id;

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
    public function getTrimesterRank()
    {
        return $this->trimester_rank;
    }

    /**
     * @param mixed $trimester_rank
     */
    public function setTrimesterRank($trimester_rank)
    {
        $this->trimester_rank = $trimester_rank;
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

}