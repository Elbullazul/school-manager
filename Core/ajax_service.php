<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-26
 * Time: 19:24
 */

namespace Core;

use Database\Entities\competence_entity;
use Database\Entities\competence_ponderation_entity;
use Database\Repositories\competence_ponderations_repository;
use Database\Repositories\competences_repository;
use Services\posts;
use Services\urls;
use Services\labels;

class ajax_service
{
    private $action;
    private $query;

    function __construct()
    {
        $this->query = urls::get();
        $params = urls::parse();

        if (!empty($this->query) && count($params) >= 2) {
            $this->action = $params[1];
        }
    }

    function __call($name, $arguments)
    {
        // TODO: Cause AJAX Error
    }

    function start()
    {
        $action = $this->action;
        $this->$action();
    }

    // accepted callbacks
    function save_competence()
    {
        dump($_POST);

        if (!is_null($_POST)) {
            if (posts::is_set('name') &&
                posts::is_set('code') &&
                posts::is_set('desc') &&
                posts::is_set('pond_t1') &&
                posts::is_set('pond_t2') &&
                posts::is_set('pond_t3')
            ) {
                $entity = new competence_entity();
                $entity->setName(posts::get('name'));
                $entity->setCode(posts::get('code'));
                $entity->setDescription(posts::get('desc'));

                $trimesters = array();

                // if all are selected, set to NULL
                $trimesters[] = [1 => posts::get('pond_t1')];
                $trimesters[] = [2 => posts::get('pond_t2')];
                $trimesters[] = [3 => posts::get('pond_t3')];

                $repo = new competences_repository();
                $t_repo = new competence_ponderations_repository();

                // save course
                $repo->save($entity);

                foreach ($trimesters as $rank => $ponderation) {
                    $trim_pond = new competence_ponderation_entity();
                    $trim_pond->setTrimesterRank($rank);
                    $trim_pond->getCompetenceId()

                    $t_repo->save();
                }

//                foreach ($trimesters as $current_year_trimester_id) {
                    // get trimester id by result index when sorted by name/id
//                    $trimester = $t_repo->get_year_trimester($current_year_trimester_id);
//
//                    $entity->setTrimesterId($trimester);
//                }

//                $ID = $repo->save($trimesters);

                echo labels::get('@UI35');
            } else {
                echo labels::get('@SYS01');
            }
        }
    }
}