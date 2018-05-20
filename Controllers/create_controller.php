<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-25
 * Time: 09:38
 */

namespace Controllers;

use Core\security;
use Database\Managers\classes_manager;
use Database\Managers\days_manager;
use Database\Managers\evaluations_competences_manager;
use Database\Managers\evaluations_manager;
use Database\Managers\periods_manager;
use Database\Managers\teachers_manager;
use Objects\Factories\course_instances_factory;
use Objects\Factories\evaluations_competences_factory;
use Objects\Factories\evaluations_factory;
use Services\links;
use Services\posts;
use Services\flashes;
use Objects\Factories\courses_factory;
use Database\Managers\courses_manager;
use Database\Managers\absences_manager;
use Objects\Factories\absences_factory;
use Database\Managers\competences_manager;
use Database\Managers\scholar_years_manager;
use Database\Managers\scholar_levels_manager;
use Database\Managers\course_instances_manager;
use Database\Managers\scholar_trimesters_manager;
use Database\Managers\course_competences_manager;
use Objects\Factories\course_competences_factory;

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

    function write_new_course()
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

    function absences()
    {

        $courses_manager = new course_instances_manager();
        $courses_models = $courses_manager->fetch_current();
		
        $data = array(
            'COURSES' => $courses_models
        );

        $this->view(links::get('create-absences'), $data);
    }

    function write_new_absence()
    {
        if (posts::empty()) {
            redirect(links::get('create-absences'));
        }

        $data = $_POST;
        $absence_bundle = array(
            'id' => NULL,
            'course_instance_id' => $data['inputCourseInstanceId'],
            'student_id' => $data['inputStudent'],
            'teacher_id' => $data['inputAbsencySubmitter'],
            'date' => $data['inputDate'],
            'time_absent' => $data['inputAbsenceDuration'],
            'comment' => $data['inputComment']
        );

        $absence_model = absences_factory::construct($absence_bundle);
        $absences_manager = new absences_manager();
        $absences_manager->save($absence_model);

        flashes::set('@UI41', flashes::SUCCESS, true);
        redirect($this->home());
    }

    function schedule()
    {
        $trimesters_manager = new scholar_trimesters_manager();
        $trimester_models = $trimesters_manager->fetch_current_and_future();

        $scholar_years_manager = new scholar_years_manager();
        $scholar_years_models = $scholar_years_manager->fetch_all_newer_first();

        $bundle = array(
            "TRIMESTERS" => $trimester_models,
            "YEARS" => $scholar_years_models
        );

        $this->view(links::get('create-schedule'), $bundle);
    }

    function schedule_courses()
    {
//        if (!posts::exists()) {
//            redirect(links::get('create-schedule'));
//        }

        $courses_manager = new courses_manager();
        $courses_models = $courses_manager->fetch_all();

        $periods_manager = new periods_manager();
        $periods_models = $periods_manager->fetch_all();

        $days_manager = new days_manager();
        $days_models = $days_manager->fetch_all();

        $classes_manager = new classes_manager();
        $classes_models = $classes_manager->fetch_all();

        $teachers_manager = new teachers_manager();
        $teachers_models = $teachers_manager->fetch_all();

        $bundle = array(
            'COURSES' => $courses_models,
            'PERIODS' => $periods_models,
            'DAYS' => $days_models,
            'CLASSES' => $classes_models,
            'TEACHERS' => $teachers_models
        );

        $this->view(links::get('create-schedule-courses'), $bundle);
    }

    function evaluation()
    {
        $course_instances_manager = new course_instances_manager();
        $course_instances_models = $course_instances_manager->fetch_current();

        $bundle = array(
            'COURSES' => $course_instances_models
        );

        $this->view(links::get('create-evaluation'), $bundle);
    }

    function write_new_evaluation()
    {
        if (posts::empty()) {
            redirect($this->home());
        }
		
        $data = $_POST;
        $competence_ids = explode(',', $data['inputCompetences']);

        $course_id = $data['inputCourseInstances'];
        $course_instance_bundle = array(
            'id' => $course_id,
            'course_id' => NULL,
            'teacher_id' => NULL,
            'trimester_id' => NULL,
            'class_id' => NULL,
            'day_id' => NULL,
            'period_id' => NULL
        );

        $is_final = 0;
        $is_global = 0;

        if (posts::is_set('is_final')) {
            $is_final = true;
        }
        if (posts::is_set('is_global_ponderation')) {
            $is_global = true;
        }

        $evaluations_manager = new evaluations_manager();
        $evaluations_competences_manager = new evaluations_competences_manager();

        $evaluation_bundle = array(
            'id' => NULL,
            'competences' => NULL,
            'name' => $data['inputName'],
            'description' => $data['inputDescription'],
            'points' => $data['inputPoints'],
            'is_final' => $is_final,
            'ponderation' => $data['inputPonderation'],
            'is_global_ponderation' => $is_global
        );
        $course_competence_model = evaluations_factory::construct($evaluation_bundle);
        $evaluation_id = $evaluations_manager->save_get_last_id($course_competence_model);

        foreach ($competence_ids as $competence_id) {
            $evaluation_competence_bundle = array(
                'ponderation' => NULL,
                'competence_id' => $competence_id,				
                'evaluation_id' => $evaluation_id
            );
			
            $evaluation_competence_model = evaluations_competences_factory::construct($evaluation_competence_bundle);
            $evaluations_competences_manager->save($evaluation_competence_model);
        }

        flashes::set('@UI50', flashes::SUCCESS, true);
        redirect($this->home());
    }

    function write_new_schedule_courses()
    {
        if (!posts::exists()) {
            redirect($this->home());
        }

        $data = $_POST;

        $objects = json_decode($data['inputInstances']);
        $course_instances_manager = new course_instances_manager();

        foreach ($objects as $object) {
            $course_instance_bundle = array(
                'id' => NULL,
                'course_id' => $object->course_id,
                'teacher_id' => $object->teacher_id,
                'trimester_id' => $object->trimester_id,
                'class_id' => $object->class_id,
                'day_id' => $object->day_id,
                'period_id' => $object->period_id
            );

            $course_instance_model = course_instances_factory::construct($course_instance_bundle);
            $course_instances_manager->save($course_instance_model);

        }

        flashes::set('@UI51', flashes::SUCCESS, true);
        redirect($this->home());
    }

    function view($tag, $data = array())
    {
        security::access($tag);
        // beta
        security::authorize($tag);
        parent::view($tag, $data);
    }

    function home()
    {
        return links::get('create-general');
    }

}