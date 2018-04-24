<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:51
 */

namespace Database\Entities;


class scholar_cycle_entity extends entity
{
    private $id;
    private $name;

    function name($_name) {
        $this->name = $_name;
    }

    function properties()
    {
        return array(
            "id" => $this->id,
            "name" => $this->name
        );
    }

}