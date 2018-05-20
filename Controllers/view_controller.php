<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-23
 * Time: 09:01
 */

namespace Controllers;

use Core\security;
use Database\Managers\absences_manager;
use Database\Managers\course_instances_manager;
use Database\Managers\courses_manager;
use Database\Managers\days_manager;
use Database\Managers\periods_manager;
use Database\Managers\scholar_trimesters_manager;
use Database\Managers\scholar_years_manager;
use Database\Managers\students_manager;
use Objects\Models\period_model;
use Services\links;
use Database\Repositories\days_repository;
use Database\Repositories\periods_repository;
use Database\Repositories\classes_repository;
use Database\Repositories\courses_repository;
use Database\Repositories\scholar_levels_repository;
use Database\Repositories\courses_instances_repository;
use Database\Repositories\scholar_trimesters_repository;

class view_controller extends controller
{
    function general()
    {
        $this->view(links::get('view-general'));
    }

    function schedule()
    {
        $trimesters_manager = new scholar_trimesters_manager();
        $trimester_model = $trimesters_manager->find_current();

        // TODO: Load schedule for user only
        $course_instances_manager = new course_instances_manager();
        $course_instance_models = $course_instances_manager->fetch_current();

        $periods_manager = new periods_manager();
        $period_models = $periods_manager->fetch_all();

        $days_manager = new days_manager();
        $day_models = $days_manager->fetch_all();

        // Build schedule array
        $schedule = [];

        foreach ($course_instance_models as $course_instance_model) {
            $period_id = array_search($course_instance_model->getPeriod(), $period_models);
            $day_id = array_search($course_instance_model->getDay(), $day_models);

            $schedule[($day_id + 1)][($period_id + 1)] = $course_instance_model;
        }

        // pack
        $bundle = array(
            'SCHEDULE' => $schedule,
            'PERIODS' => $period_models,
            'DAYS' => $day_models,
            'TRIMESTER' => $trimester_model
        );

        // load view
        $this->view(links::get('view-schedule'), $bundle);
    }


    function absences() {
        $manager = new absences_manager();
        $absences = $manager->fetch_all();

        $instances_manager = new course_instances_manager();
        $students_manager = new students_manager();

        foreach ($absences as $absence) {
            $student_id = $absence->getStudentId();
            $instance_id = $absence->getCourseInstanceId();

            $student = $students_manager->find_by_id($student_id);
            $course_instance = $instances_manager->find_by_id($instance_id);

            $absence->setStudentId($student);
            $absence->setCourseInstanceId($course_instance);
        }

        $bundle = array(
            'ABSENCES' => $absences
        );

        $this->view(links::get('view-absences'), $bundle);
    }

    function view($tag, $data = array())
    {
        security::access($tag);
        parent::view($tag, $data);
    }

    function home()
    {
        return links::get('view-general');
    }
}