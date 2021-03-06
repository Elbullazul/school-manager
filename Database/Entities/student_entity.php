<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-04
 * Time: 09:30
 */

namespace Database\Entities;

use Objects\Models\student_model;

class student_entity
{
    private $id;
    private $person_id;
    private $user_id;

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
    public function getPersonId()
    {
        return $this->person_id;
    }

    /**
     * @param mixed $person_id
     */
    public function setPersonId($person_id)
    {
        $this->person_id = $person_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    function to_model()
    {
        $model = new student_model();
        $model->setId($this->id);
        $model->setPersonId($this->person_id);
        $model->setUserId($this->user_id);

        return $model;
    }
}