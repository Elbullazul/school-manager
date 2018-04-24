<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:38
 */

namespace Database\Entities;


class scholar_trimester_entity extends entity
{
    private $id;
    private $begins;
    private $ends;
    private $scholar_year_id;

    function begins($_begins) {
        $this->begins = $_begins;
    }

    function ends($_ends) {
        $this->ends = $_ends;
    }

    function scholar_year_id($_scholar_year_id) {
        $this->scholar_year_id = $_scholar_year_id;
    }

    function properties()
    {
        return array(
            "id" => $this->id,
            "begins" => $this->begins,
            "ends" => $this->ends,
            "scholar_year_id" => $this->scholar_year_id
        );
    }

}