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
use Database\Managers\scholar_levels_manager;
use Database\Repositories\course_competences_repository;
use Database\Repositories\courses_repository;
use Database\Repositories\scholar_cycles_repository;
use Database\Repositories\scholar_levels_repository;
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
        // TODO: Use manager
        $level_manager = new scholar_levels_manager();
        $level_models = $level_manager->fetch_all();

//        $repo = new scholar_levels_repository();
        $c_repo = new scholar_cycles_repository();
//        $levels = $repo->fetch_all();

        $levels = [];
        $the_levels = array();

        foreach ($level_models as $level_model) {

            $ID = $level_model->getId();

            $the_levels[$ID]['name'] = $level_model->getName();
            $cycle = $c_repo->find('id', $level_model->getCycleId());
            $the_levels[$ID]['cycle'] = $cycle->getName();
        }

        $bundle = array(
            'LEVELS' => $the_levels
        );

        $this->view(links::get('create-course'), $bundle);
    }

    function competence()
    {
        // load competences
        $repo = new competences_repository();
        $competences = $repo->fetch_all();

        $the_competences = array();

        // TODO: Use manager
        foreach ($competences as $competence) {
            $ID = $competence->getId();

            $the_competences[$ID]['code'] = $competence->getCode();
            $the_competences[$ID]['name'] = $competence->getName();
            $the_competences[$ID]['description'] = $competence->getDescription();
        }

        $level = posts::get('inputLevelName');

        $course['name'] = posts::get('inputName');
        $course['code'] = posts::get('inputCode');
        $course['level'] = posts::get('inputLevel');

        $bundle = array(
            'COMPETENCES' => $the_competences,
            'LEVEL' => $level,
            'COURSE' => $course
        );

        $this->view(links::get('create-competence'), $bundle);
    }

    function write()
    {
        dump($_POST);

        $course_data = $_POST['course'];
        $competence_ids = explode(',', $_POST['competences']);

        $course = new course_entity();  // TODO: Use manager instead
        $course->setName($course_data['name']);
        $course->setCode($course_data['code']);
        $course->setLevelId($course_data['level']);

        $repo = new courses_repository();
        $course_ID = $repo->save($course);

        $repo = new course_competences_repository();

        foreach ($competence_ids as $competence_id) {
            $course_competence = new course_competence_entity();    // TODO: Use manager instead
            $course_competence->setCompetenceId($competence_id);
            $course_competence->setCourseId($course_ID);

            $repo->save($course_competence);
        }

        flashes::set('@UI41',flashes::SUCCESS, true);

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