<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-11
 * Time: 10:52
 */

namespace Objects\Models;

class evaluation_competence_model extends model
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

    function to_entity()
    {
        // TODO: Implement to_entity() method.
    }

}