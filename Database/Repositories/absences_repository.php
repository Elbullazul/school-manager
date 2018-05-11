<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-07
 * Time: 15:01
 */

namespace Database\Repositories;

use Database\query_builder;
use Database\Entities\absence_entity;

class absences_repository extends repository
{
    public function __construct()
    {
        $this->table = "absences";
        $this->entity = absence_entity::class;
    }

    function find($field, $value)
    {
        $engine = new query_builder($this->entity, query_builder::FETCH);
        $engine->select(
            'id',
            'course_instance_id',
            'student_id',
            'teacher_id',
            'date',
            'time_absent',
            'comment',
            /* METADATA */
            'modified_by',
            'date_created',
            'date_modified'
        )->from($this->table)->where($field.' = '.$value);
        $ret = $engine->execute();

        return $ret;
    }

    function find_all($field, $value)
    {
        $engine = new query_builder($this->entity, query_builder::FETCH_ALL);
        $engine->select(
            'id',
            'course_instance_id',
            'student_id',
            'teacher_id',
            'date',
            'time_absent',
            'comment',
            /* METADATA */
            'modified_by',
            'date_created',
            'date_modified'
        )->from($this->table)->where($field.' = '.$value);
        $ret = $engine->execute();

        return $ret;
    }

    function save($model)
    {
        $engine = new query_builder($this->entity, query_builder::EXECUTE);
        $engine->insert($this->table, ['course_instance_id', 'student_id', 'teacher_id', 'date', 'time_absent', 'comment'])
            ->values($model->getCourseInstanceId(), $model->getStudentId(), $model->getTeacherId(), $model->getDate(),
                $model->getTimeAbsent(), $model->getComment());
        $ret = $engine->execute();

        return $ret;
    }

    function update($field, $value, $model)
    {
        // TODO: Implement update() method.
    }

}