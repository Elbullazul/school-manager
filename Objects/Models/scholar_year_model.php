<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:33
 */

namespace Objects\Models;

use Database\Entities\scholar_year_entity;

class scholar_year_model extends model
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

    function to_entity()
    {
        $entity = new scholar_year_entity();
        $entity->setId($this->id);
        $entity->setEnds($this->ends);
        $entity->setBegins($this->begins);

        return $entity;
    }

}