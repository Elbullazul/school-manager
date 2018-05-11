<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-07
 * Time: 14:33
 */

namespace Objects\Models;

class absence_model extends model
{
    private $id;
    private $course_instance_id;
    private $student_id;
    private $teacher_id;
    private $date;
    private $time_absent;
    private $comment;

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
    public function getCourseInstanceId()
    {
        return $this->course_instance_id;
    }

    /**
     * @param mixed $course_instance_id
     */
    public function setCourseInstanceId($course_instance_id)
    {
        $this->course_instance_id = $course_instance_id;
    }

    /**
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->student_id;
    }

    /**
     * @param mixed $student_id
     */
    public function setStudentId($student_id)
    {
        $this->student_id = $student_id;
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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getTimeAbsent()
    {
        return $this->time_absent;
    }

    /**
     * @param mixed $time_absent
     */
    public function setTimeAbsent($time_absent)
    {
        $this->time_absent = $time_absent;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    function to_entity()
    {
        // TODO: Implement to_entity() method.
    }

}