<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:09
 */

namespace Database\Entities;


class period_entity extends entity
{
    private $id;
    private $begins;
    private $ends;

    function begins($_begins)
    {
        $this->begins = $_begins;
    }

    function ends($_ends)
    {
        $this->ends = $_ends;
    }

    function properties()
    {
        return array(
            "id" => $this->id,
            "begins" => $this->begins,
            "ends" => $this->ends
        );
    }
}