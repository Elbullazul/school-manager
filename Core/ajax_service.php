<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-26
 * Time: 19:24
 */

namespace Core;

use Database\Managers\competence_ponderations_manager;
use Database\Managers\competences_manager;
use Database\Managers\courses_manager;
use Objects\Factories\competence_ponderations_factory;
use Objects\Factories\competences_factory;
use Objects\Factories\courses_factory;
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
        // Invalid request
        http_response_code(400);
    }

    function start()
    {
        $action = $this->action;
        $this->$action();
    }

    function is_valid_code()
    {
        if (posts::exists()) {
            if (posts::is_set('course_code')) {

                $code = posts::get('course_code');
                $course_model = courses_factory::construct
                ([
                    'id' => NULL, 'code' => $code, 'name' => NULL,
                    'level' => NULL, 'competences' => NULL, 'dependencies' => []
                ]);

                $course_manager = new courses_manager();

                // DOC: JQuery expects the response encoded in JSON
                if (!$course_manager->exists($course_model)) {
                    echo json_encode(true);
                } else {
                    echo json_encode(false);
                }
            }
        } else {
            http_response_code(400);
        }
    }

    // accepted callbacks
    function save_competence()
    {
        if (posts::exists()) {
            if (posts::are_set('name', 'code', 'description', 'ponderations')) {
                $bundle = posts::get_all();
                $bundle['id'] = NULL;

                $competences_manager = new competences_manager();
                $competence_model = competences_factory::construct($bundle);
                $ID = $competences_manager->save_get_id($competence_model);

                $competence_ponderations_manager = new competence_ponderations_manager();

                foreach ($bundle['ponderations'] as $rank => $ponderation) {
                    $ponderation_bundle = ['competence_id' => $ID, 'trimester_rank' => ($rank + 1), 'ponderation' => $ponderation];

                    $competence_ponderations_model = competence_ponderations_factory::construct($ponderation_bundle);
                    $competence_ponderations_manager->save($competence_ponderations_model);
                }
                echo labels::get('@UI35');
            } else {
                http_response_code(400);
            }
        } else {
            http_response_code(400);
        }
    }
}