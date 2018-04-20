<?php

namespace Database\Entities;

abstract class Entity
{
    protected $modified_by;   // persist
    protected $date_created;  // persist
    protected $date_modified; // persist

    function modifed_by($_user = NULL)
    {
        if (!is_null($_user)) {
            $this->modifed_by = $_user;
        }
        return $this->modifed_by;
    }

    function date_created($_date = NULL)
    {
        if (!is_null($_date)) {
            $this->date_created = $_date;
        }
        return $this->date_created;
    }

    function date_modified($_date = NULL)
    {
        if (!is_null($_date)) {
            $this->date_modified = $_date;
        }
        return $this->date_modified;
    }

    abstract function properties();
}


?>
