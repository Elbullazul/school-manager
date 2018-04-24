<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 16:41
 */

namespace Database\Entities;


class class_entity extends entity
{
    private $id;
    private $code;
    private $description;

    function code($_code) {
        $this->code = $_code;
    }

    function description($_description) {
        $this->description = $_description;
    }

    function properties()
    {
        return array(
            "id" => $this->id,
            "code" => $this->code,
            "description" => $this->description
        );
    }

}