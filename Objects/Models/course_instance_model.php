<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:18
 */

namespace Objects\Models;

use Database\Entities\course_instance_entity;

class course_instance_model extends model
{
    private $id;
    private $course_id;
    private $trimester_id;
    private $teacher_id;
    private $period;
    private $day;
    private $class;

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
    public function getTrimesterId()
    {
        return $this->trimester_id;
    }

    /**
     * @param mixed $trimester_id
     */
    public function setTrimesterId($trimester_id)
    {
        $this->trimester_id = $trimester_id;
    }

    /**
     * @return mixed
     */
    public function getCourseId()
    {
        return $this->course_id;
    }

    /**
     * @param mixed $course_id
     */
    public function setCourseId($course_id)
    {
        $this->course_id = $course_id;
    }

    /**
     * @return mixed
     */
    public function getTeacherId()
    {
        return $this->teacher_id;
    }

    /**
     * @param mixed $teacher_id
     */
    public function setTeacherId($teacher_id)
    {
        $this->teacher_id = $teacher_id;
    }

    /**
     * @return mixed
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param mixed $period
     */
    public function setPeriod($period)
    {
        $this->period = $period;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->dayd;
    }

    /**
     * @param mixed $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    function to_entity()
    {
        $entity = new course_instance_entity();
        $entity->setId($this->id);
        $entity->setCourseId($this->course_id);
        $entity->setTrimesterId($this->trimester_id);
        $entity->setClassId($this->class_id);
        $entity->setDayId($this->day_id);
//        $entity->setPeriodId($this->period_id);
//        $entity->setTeacherId($this->teacher_id);

        return $entity;
    }

}