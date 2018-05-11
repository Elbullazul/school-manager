<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-11
 * Time: 10:11
 */

namespace Database\Entities;

use Objects\Models\evaluation_competence_model;

class evaluation_competence_entity extends entity
{
    private $ponderation;
    private $competence_id;
    private $evaluation_id;

    /**
     * @return mixed
     */
    public function getPonderation()
    {
        return $this->ponderation;
    }

    /**
     * @param mixed $ponderation
     */
    public function setPonderation($ponderation)
    {
        $this->ponderation = $ponderation;
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

    /**
     * @return mixed
     */
    public function getEvaluationId()
    {
        return $this->evaluation_id;
    }

    /**
     * @param mixed $evaluation_id
     */
    public function setEvaluationId($evaluation_id)
    {
        $this->evaluation_id = $evaluation_id;
    }

    function to_model()
    {
        $model = new evaluation_competence_model();
        $model->setPonderation($this->ponderation);
        $model->setEvaluationId($this->evaluation_id);
        $model->setCompetenceId($this->competence_id);

        return $model;
    }

}