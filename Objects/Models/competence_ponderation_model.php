<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-27
 * Time: 09:23
 */

namespace Objects\Models;


use Database\Entities\competence_ponderation_entity;

class competence_ponderation_model extends model
{
    private $competence_id;
    private $trimester_rank;
    private $ponderation;

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
    public function getTrimesterRank()
    {
        return $this->trimester_rank;
    }

    /**
     * @param mixed $trimester_rank
     */
    public function setTrimesterRank($trimester_rank)
    {
        $this->trimester_rank = $trimester_rank;
    }

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

    function to_entity()
    {
        $entity = new competence_ponderation_entity();
        $entity->setPonderation($this->ponderation);
        $entity->setCompetenceId($this->competence_id);
        $entity->setTrimesterRank($this->trimester_rank);

        return $entity;
    }

}