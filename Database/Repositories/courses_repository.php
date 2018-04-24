<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-23
 * Time: 14:08
 */

namespace Database\Repositories;

use \PDO;
use Database\connection;
use Database\Entities\course_entity;

class courses_repository extends repository
{
    public function __construct()
    {
        $this->table = "courses";
        $this->entity = course_entity::class;
    }

    function find($field, $value)
    {
        $Cnn = connection::getInstance();
        $cmd = "SELECT
              id,
              code,
              name,
              level_id,
              -- entity fields
              modified_by,
              date_created,
              date_modified
            FROM $this->table
            WHERE $this->table.$field = :$field";

        $course_data = $Cnn->prepare($cmd);

        $course_data->bindValue($field, $value, PDO::PARAM_STR);
        $course_data->setFetchMode(PDO::FETCH_CLASS, $this->entity, array());
        $course_data->execute();
        $course = $course_data->fetch();

        if (!$course) {   // query returned NULL
            $course = new $this->entity();
        }

        return $course;
    }

    function save($_model)
    {
        return false;
    }

    function update($_model, $_new_model)
    {
        return false;
    }

    function destroy($_model)
    {
        return false;
    }
}