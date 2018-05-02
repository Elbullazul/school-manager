<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-25
 * Time: 09:38
 */

namespace Controllers;

use Core\security;
use Database\Entities\course_competence_entity;
use Database\Entities\course_entity;
use Database\Managers\competences_manager;
use Database\Managers\course_competences_manager;
use Database\Managers\courses_manager;
use Database\Managers\scholar_cycles_manager;
use Database\Managers\scholar_levels_manager;
use Database\Repositories\course_competences_repository;
use Database\Repositories\courses_repository;
use Database\Repositories\scholar_cycles_repository;
use Database\Repositories\scholar_levels_repository;
use Objects\Factories\course_competences_factory;
use Objects\Factories\courses_factory;
use Objects\Factories\scholar_levels_factory;
use Services\flashes;
use Services\links;
use Services\posts;
use Database\Repositories\competences_repository;

class create_controller extends controller
{
    function general()
    {
        $this->view(links::get('create-general'));
    }

    function course()
    {
        $level_manager = new scholar_levels_manager();
        $level_models = $level_manager->fetch_all();

        $bundle = array(
            'LEVELS' => $level_models
        );

        $this->view(links::get('create-course'), $bundle);
    }

    function competence()
    {
        if (posts::empty()) {
            redirect(links::get('create-course'));
        }

        // NEW
        $competences_manager = new competences_manager();
        $competence_models = $competences_manager->fetch_all();

        $course_bundle = [
            'id' => NULL,
            'code' => posts::get('inputCode'),
            'name' => posts::get('inputName'),
            'level' => posts::get('inputLevel'),
            'competences' => [],
            'dependencies' => []
        ];

        $course_model = courses_factory::construct($course_bundle);

        $bundle = array(
            'COMPETENCES' => $competence_models,
            'LEVEL' => posts::get('inputLevelName'),
            'COURSE' => $course_model
        );

        $this->view(links::get('create-competence'), $bundle);
    }

    function write()
    {
        if (posts::empty()) {
            redirect($this->home());
        }

        $data = $_POST['course'];
        $competence_ids = explode(',', $_POST['competences']);

        $data['id'] = NULL;
        $data['competences'] = [];
        $data['dependencies'] = [];

        $course_model = courses_factory::construct($data);
        $courses_manager = new courses_manager();
        $course_id = $courses_manager->save_get_id($course_model);

        $course_competences_manager = new course_competences_manager();

        foreach ($competence_ids as $competence_id) {
            $course_competence_model = course_competences_factory::construct
            ([
                'course_id' => $course_id,
                'competence_id' => $competence_id
            ]);
            $course_competences_manager->save($course_competence_model);
        }

        flashes::set('@UI41', flashes::SUCCESS, true);
        redirect($this->home());
    }

    function view($tag, $data = array())
    {
        security::access();
        parent::view($tag, $data);
    }

    function home()
    {
        return links::get('create-general');
    }

}