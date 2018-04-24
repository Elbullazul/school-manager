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

    function id($_id)
    {
        $this->id = $_id;
    }

    function trimester_id($_trimester_id)
    {
        $this->trimester_id = $_trimester_id;
    }

    function course_id($_course_id)
    {
        $this->course_id = $_course_id;
    }

    function teacher_id($_teacher_id)
    {
        $this->teacher_id = $_teacher_id;
    }

    function period_id($_period_id)
    {
        $this->period_id = $_period_id;
    }

    function day_id($_day_id)
    {
        $this->day_id = $_day_id;
    }

    function class_id($_class_id)
    {
        $this->class_id = $_class_id;
    }

    function properties()
    {
        return array(
            "id" => $this->id,
            "trimester_id" => $this->trimester_id,
            "course_id" => $this->course_id,
            "teacher_id" => $this->teacher_id,
            "period_id" => $this->period_id,
            "day_id" => $this->day_id,
            "class_id" => $this->class_id
        );

    }

}