<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:26
 */

namespace Database\Repositories;

use Database\query_builder;
use Database\Entities\course_instance_entity;
use Services\date;

class courses_instances_repository extends repository
{
    public function __construct()
    {
        $this->table = "courses_instances";
        $this->entity = course_instance_entity::class;
    }

    function find($field, $value)
    {
        $engine = new query_builder($this->entity, query_builder::FETCH);
        $engine->select(
            'id',
            'trimester_id',
            'course_id',
            'teacher_id',
            'period_id',
            'day_id',
            'class_id',
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
            'trimester_id',
            'course_id',
            'teacher_id',
            'period_id',
            'day_id',
            'class_id',
            /* METADATA */
            'modified_by',
            'date_created',
            'date_modified'
        )->from($this->table)->where($field.' = '.$value);
        $ret = $engine->execute();

        return $ret;
    }

    function find_current($trimester_id)
    {
        $engine = new query_builder($this->entity, query_builder::FETCH_ALL);
        $engine->select(
            'id',
            'trimester_id',
            'course_id',
            'teacher_id',
            'period_id',
            'day_id',
            'class_id',
            /* METADATA */
            'modified_by',
            'date_created',
            'date_modified'
        )->from($this->table)->where('trimester_id = '.$trimester_id);
        $ret = $engine->execute();

        return $ret;
    }

    function save($model)
    {
        $engine = new query_builder($this->entity, query_builder::EXECUTE);
        $engine->insert($this->table, ['trimester_id','course_id','teacher_id','period_id', 'day_id', 'class_id'])
            ->values($model->getTrimesterId(), $model->getCourse(), $model->getTeacherId(), $model->getPeriod(),
                $model->getDay(), $model->getClass());
        $ret = $engine->execute();

        return $ret;
    }

    function update($field, $value, $model)
    {
        // TODO: Implement update() method.
    }

}