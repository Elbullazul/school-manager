<?php

namespace Database\Entities;

abstract class entity
{
    protected $modified_by;   // persist
    protected $date_created;  // persist
    protected $date_modified; // persist

    function modified_by()
    {
        return $this->modifed_by;
    }

    function date_created()
    {
        return $this->date_created;
    }

    function date_modified()
    {
        return $this->date_modified;
    }

    function get($key)
    {
        return $this->properties()[$key];
    }

    abstract function properties();

    function metadata() {
        return array(
            "date_created" => $this->date_created,
            "date_modified" => $this->date_modified,
            "modified_by" => $this->modified_by
        );
    }
}


?>
