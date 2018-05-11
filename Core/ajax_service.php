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
use Database\Managers\course_instances_manager;
use Database\Managers\courses_manager;
use Database\Managers\courses_registrations_manager;
use Database\Managers\scholar_trimesters_manager;
use Database\Managers\scholar_years_manager;
use Database\Managers\students_manager;
use Objects\Factories\competence_ponderations_factory;
use Objects\Factories\competences_factory;
use Objects\Factories\course_instances_factory;
use Objects\Factories\courses_factory;
use Objects\Factories\scholar_trimesters_factory;
use Objects\Factories\scholar_years_factory;
use Objects\Models\absence_model;
use Services\links;
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

    static function get_action_url($tag)
    {
        $path = "";
        $file = RESOURCES . '\xml\ajax.xml';
        $xml = simplexml_load_file($file);

        foreach ($xml as $node) {
            if ($node->tag == $tag) {
                $path = $node->url;
                break;
            }
        }

        return $path;
    }

    function __call($name, $arguments)
    {
        // Invalid request
        $this->error();
    }

    function start()
    {
        $action = $this->action;
        $this->$action();
    }

    function is_valid_course_code()
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
                echo json_encode(!$course_manager->exists($course_model));
            }
        } else {
            $this->error();
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
                $this->error();
            }
        } else {
            $this->error();
        }
    }

    function get_students_by_course()
    {
        if (posts::exists()) {
            if (posts::is_set('course_instance_id')) {

                $course_instance_bundle = array(
                    'id' => posts::get('course_instance_id'),
                    'course_id' => NULL,
                    'teacher_id' => NULL,
                    'trimester_id' => NULL,
                    'class_id' => NULL,
                    'day_id' => NULL,
                    'period_id' => NULL
                );

                $course_instance_model = course_instances_factory::construct($course_instance_bundle);

                $course_instances_manager = new course_instances_manager();
                $course_instances_model = $course_instances_manager->find($course_instance_model);

                $courses_registrations_manager = new courses_registrations_manager();
                $course_registrations_models = $courses_registrations_manager->find_all_from_course_instance($course_instances_model);

                $students_models = [];
                $students_manager = new students_manager();

                foreach ($course_registrations_models as $course_registration_model) {
                    $student_model = $students_manager->find_from_registration($course_registration_model);
                    $students_models[] = $student_model;
                }

                echo json_encode($students_models);

            } else {
                $this->error();
            }
        } else {
            $this->error();
        }
    }

    function save_trimester()
    {
        dump($_POST);

        if (posts::exists()) {
            if (posts::are_set('code', 'name', 'year_id', 'rank', 'begins', 'ends')) {
                $data = $_POST;

                $trimester_bundle = array(
                    'id' => $data['code'],
                    'name' => $data['name'],
                    'scholar_year_id' => $data['year_id'],
                    'rank' => $data['rank'],
                    'begins' => $data['begins'],
                    'ends' => $data['ends']
                );

                $trimesters_manager = new scholar_trimesters_manager();
                $trimester_model = scholar_trimesters_factory::construct($trimester_bundle);

                $trimesters_manager->save($trimester_model);

                echo labels::get('@UI47');
            } else {
                $this->error();
            }
        } else {
            $this->error();
        }
    }

    function is_valid_trimester_code()
    {
        if (posts::exists()) {
            if (posts::is_set('trimester_code')) {
                $trimester_bundle = array(
                    'id' => posts::get('trimester_code'),
                    'name' => NULL,
                    'scholar_year_id' => NULL,
                    'rank' => NULL,
                    'begins' => NULL,
                    'ends' => NULL
                );

                $trimesters_manager = new scholar_trimesters_manager();
                $trimester_model = scholar_trimesters_factory::construct($trimester_bundle);
                echo json_encode(!$trimesters_manager->exists($trimester_model));
            } else {
                $this->error();
            }
        } else {
            $this->error();
        }
    }

    function save_scholar_year()
    {
        if (posts::exists()) {
            if (posts::are_set('code', 'begins', 'ends')) {

                $data = $_POST;

                $year_bundle = array(
                    'id' => $data['code'],
                    'begins' => $data['begins'],
                    'ends' => $data['ends']
                );

                $years_manager = new scholar_years_manager();
                $year_model = scholar_years_factory::construct($year_bundle);

                $years_manager->save($year_model);

                echo labels::get('@UI48');
            } else {
                $this->error();
            }
        } else {
            $this->error();
        }
    }

    function is_valid_scholar_year()
    {
        if (posts::exists()) {
            if (posts::is_set('code')) {

                $data = $_POST;

                $year_bundle = array(
                    'id' => $data['code'],
                    'begins' => NULL,
                    'ends' => NULL
                );

                $year_manager = new scholar_years_manager();
                $year_model = scholar_years_factory::construct($year_bundle);

                echo json_encode(!$year_manager->exists($year_model));
            } else {
                $this->error();
            }
        } else {
            $this->error();
        }
    }

    function load_course_competences()
    {

        if (!posts::exists()) {
            redirect(links::get('create-schedule'));
        }

        $data = $_POST;

        $course_instance_bundle = array(
            'id' => $data['instance_id'],
            'course_id' => NULL,
            'teacher_id' => NULL,
            'trimester_id' => NULL,
            'class_id' => NULL,
            'day_id' => NULL,
            'period_id' => NULL
        );

        $course_instances_manager = new course_instances_manager();
        $course_instance_model = course_instances_factory::construct($course_instance_bundle);
        $populated_course_instance_model = $course_instances_manager->find($course_instance_model);

        $competences = $populated_course_instance_model->getCourse()->getCompetences();
        echo json_encode($competences);
    }

    protected function error()
    {
        http_response_code(400);
    }
}