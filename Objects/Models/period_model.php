<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:09
 */

namespace Objects\Models;


use Database\Entities\period_entity;

class period_model extends model
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

    public function genTag()
    {
        $tag = substr($this->begins, 0, strlen($this->begins) - 3) . ' - ';
        $tag = $tag . substr($this->ends, 0, strlen($this->ends) - 3);

        return $tag;
    }

    function to_entity()
    {
        $entity = new period_entity();
        $entity->setId($this->id);
        $entity->setBegins($this->begins);
        $entity->setEnds($this->ends);

        return $entity;
    }
}