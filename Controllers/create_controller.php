<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-25
 * Time: 09:38
 */

namespace Controllers;

use Core\security;
use Database\Repositories\scholar_cycles_repository;
use Database\Repositories\scholar_levels_repository;
use Services\links;
use Services\posts;
use Database\Repositories\competences_repository;

class create_controller extends controller
{
    function general()
    {
        $this->view(links::get('create-general'));
    }

    function course() {

        $repo = new scholar_levels_repository();
        $c_repo = new scholar_cycles_repository();
        $levels = $repo->fetch_all();

        $the_levels = array();

        foreach ($levels as $level) {
            $ID = $level->getId();

            $the_levels[$ID]['name'] = $level->getName();
            $cycle = $c_repo->find('id', $level->getCycleId());
            $the_levels[$ID]['cycle'] = $cycle->getName();
        }

        $bundle = array(
            'LEVELS' => $the_levels
        );

        $this->view(links::get('create-course'), $bundle);
    }

    function competence() {
        // load competences
        $repo = new competences_repository();
        $competences = $repo->fetch_all();

        $the_competences = array();

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

    function write() {
        dump($_POST);
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