<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:55
 */

namespace Database\Entities;


class scholar_level_entity extends entity
{
    private $id;
    private $name;
    private $cycle_id;

    function name($_name) {
        $this->name = $_name;
    }

    function cycle_id($_cycle_id) {
        $this->cycle_id = $_cycle_id;
    }

    function properties()
    {
        return array(
            "id" => $this->id,
            "name" => $this->name,
            "cycle_id" => $this->cycle_id
        );
    }

}