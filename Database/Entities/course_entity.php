<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 10:30
 */

namespace Database\Entities;


class course_entity extends entity
{
    private $id;
    private $code;
    private $name;
    private $level_id;

    function id($_id)
    {
        $this->id = $_id;
    }

    function code($_code)
    {
        $this->code = $_code;
    }

    function name($_name)
    {
        $this->name = $_name;
    }

    function level_id($_level_id)
    {
        $this->level_id = $_level_id;
    }

    function properties()
    {
        return array(
            "id" => $this->id,
            "code" => $this->code,
            "name" => $this->name,
            "level_id" => $this->level_id
        );
    }

}