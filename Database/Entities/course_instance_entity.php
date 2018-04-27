<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:18
 */

namespace Database\Entities;


class course_instance_entity extends entity
{
    private $id;
    private $trimester_id;
    private $course_id;
    private $teacher_id;
    private $period_id;
    private $day_id;
    private $class_id;

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
    public function getPeriodId()
    {
        return $this->period_id;
    }

    /**
     * @param mixed $period_id
     */
    public function setPeriodId($period_id)
    {
        $this->period_id = $period_id;
    }

    /**
     * @return mixed
     */
    public function getDayId()
    {
        return $this->day_id;
    }

    /**
     * @param mixed $day_id
     */
    public function setDayId($day_id)
    {
        $this->day_id = $day_id;
    }

    /**
     * @return mixed
     */
    public function getClassId()
    {
        return $this->class_id;
    }

    /**
     * @param mixed $class_id
     */
    public function setClassId($class_id)
    {
        $this->class_id = $class_id;
    }

}