<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-26
 * Time: 20:45
 */

namespace Objects\Models;

use Database\Entities\competence_entity;

class competence_model extends model
{
    private $id;
    private $name;
    private $code;
    private $description;
    private $ponderations;

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
    public function getPonderations()
    {
        return $this->ponderations;
    }

    /**
     * @param mixed $ponderations
     */
    public function setPonderations(array $ponderations)
    {
        $this->ponderations = $ponderations;
    }

    public function jsonSerialize()
    {
        $json = [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description
        ];

        return $json;
    }

    function to_entity()
    {
        $entity = new competence_entity();
        $entity->setId($this->id);
        $entity->setName($this->name);
        $entity->setCode($this->code);
        $entity->setDescription($this->description);

        return $entity;
    }

}