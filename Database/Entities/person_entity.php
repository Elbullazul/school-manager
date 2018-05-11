<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-02
 * Time: 10:05
 */

namespace Database\Entities;

use Objects\Models\person_model;

class person_entity extends entity
{
    protected $id;
    protected $telephone_number;
    protected $first_name;
    protected $last_name;
    protected $birthdate;
    protected $sex;

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
    public function getTelephoneNumber()
    {
        return $this->telephone_number;
    }

    /**
     * @param mixed $telephone_number
     */
    public function setTelephoneNumber($telephone_number)
    {
        $this->telephone_number = $telephone_number;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param mixed $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    function to_model()
    {
        $model = new person_model();
        $model->setId($this->id);
        $model->setSex($this->sex);
        $model->setBirthdate($this->birthdate);
        $model->setFirstName($this->first_name);
        $model->setLastName($this->last_name);
        $model->setTelephoneNumber($this->telephone_number);

        return $model;
    }

}