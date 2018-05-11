<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-07
 * Time: 14:19
 */

namespace Database\Entities;

use Objects\Models\course_registration_model;

class course_registration_entity extends entity
{
    private $student_id;
    private $course_instance_id;

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

    function to_model()
    {
        $model = new course_registration_model();
        $model->setStudentId($this->student_id);
        $model->setCourseInstanceId($this->course_instance_id);

        return $model;
    }

}