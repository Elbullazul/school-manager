<?php

namespace Database\Entities;

abstract class entity
{
    protected $modified_by;   // persist
    protected $date_created;  // persist
    protected $date_modified; // persist

    /**
     * @return mixed
     */
    public function getModifiedBy()
    {
        return $this->modified_by;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @return mixed
     */
    public function getDateModified()
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
