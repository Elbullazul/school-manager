<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-29
 * Time: 09:36
 */

namespace Database\Entities;


use Objects\Models\course_competence_model;

class course_competence_entity extends entity {
    private $course_id;
    private $competence_id;

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
    public function getCompetenceId()
    {
        return $this->competence_id;
    }

    /**
     * @param mixed $competence_id
     */
    public function setCompetenceId($competence_id)
    {
        $this->competence_id = $competence_id;
    }

    function to_model()
    {
        $model = new course_competence_model();
        $model->setCompetenceId($this->competence_id);
        $model->setCourseId($this->course_id);

        return $model;
    }
}