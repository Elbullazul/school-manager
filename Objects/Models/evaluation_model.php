<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-11
 * Time: 09:49
 */

namespace Objects\Models;

class evaluation_model extends model
{
    private $id;
    private $competences;
    private $name;
    private $description;
    private $points;
    private $ponderation;
    private $is_final;
    private $is_global_ponderation;

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
    public function getCompetences()
    {
        return $this->competences;
    }

    /**
     * @param mixed $competences
     */
    public function setCompetences($competences)
    {
        $this->competences = $competences;
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

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param mixed $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

    /**
     * @return mixed
     */
    public function getPonderation()
    {
        return $this->ponderation;
    }

    /**
     * @param mixed $ponderation
     */
    public function setPonderation($ponderation)
    {
        $this->ponderation = $ponderation;
    }

    /**
     * @return mixed
     */
    public function getisFinal()
    {
        return $this->is_final;
    }

    /**
     * @param mixed $is_final
     */
    public function setIsFinal($is_final)
    {
        $this->is_final = $is_final;
    }

    /**
     * @return mixed
     */
    public function getisGlobalPonderation()
    {
        return $this->is_global_ponderation;
    }

    /**
     * @param mixed $is_global_ponderation
     */
    public function setIsGlobalPonderation($is_global_ponderation)
    {
        $this->is_global_ponderation = $is_global_ponderation;
    }

    function to_entity()
    {
        // TODO: Implement to_entity() method.
    }

}