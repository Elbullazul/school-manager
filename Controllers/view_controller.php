<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-23
 * Time: 09:01
 */

namespace Controllers;

use Core\security;
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
        $repo = new scholar_trimesters_repository();
        $trimester = $repo->find_current();

        $the_trimester['id'] = $trimester->getId();
        $the_trimester['scholar_year'] = $trimester->getScholarYearId();

        // load course instances
        $repo = new courses_instances_repository();
        $course_instances = $repo->find('trimester_id', '\''.$trimester->getId().'\''); // TODO: get trimester automatically

        // wrap for processing
        if (!is_array($course_instances))
            $course_instances = array($course_instances);

        // load days
        $repo = new days_repository();
        $days = $repo->fetch_all();

        // load periods
        $repo = new periods_repository();
        $periods = $repo->fetch_all();

        // pack days
        foreach ($days as $day) {
            $ID = $day->getId();
            $the_days[$ID]['name'] = $day->getName();
        }

        // pack periods
        foreach ($periods as $period) {
            $ID = $period->getId();

            // pack periods
            $begins = $period->getBegins();
            $the_periods[$ID]['begins'] = substr($begins, 0, strlen($begins) - 3);

            $ends = $period->getEnds();
            $the_periods[$ID]['ends'] = substr($ends, 0, strlen($ends) - 3);
        }

        // TODO: Load schedule by user & user type
        $repo = new courses_repository();
        $class_repo = new classes_repository();

        // pack course data
        foreach ($course_instances as $course_instance) {
            $ID = $course_instance->getId();

            $the_courses[$ID]['day'] = $course_instance->getDayId();
            $the_courses[$ID]['period'] = $course_instance->getPeriodId();

            $course = $repo->find('id', $course_instance->getCourseId());
            $class = $class_repo->find('id', $course_instance->getClassId());

            $the_courses[$ID]['code'] = $course->getCode();
            $the_courses[$ID]['name'] = $course->getName();
            $the_courses[$ID]['class'] = $class->getCode();
        }

        // pack
        $bundle = array(
            'PERIODS' => $the_periods,
            'DAYS' => $the_days,
            'COURSES' => $the_courses,
            'TRIMESTER' => $the_trimester
        );

        // load view
        $this->view(links::get('view-schedule'), $bundle);
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