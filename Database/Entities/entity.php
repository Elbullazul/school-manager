<?php

namespace Database\Entities;

use Objects\Interfaces\modelizable;

abstract class entity implements modelizable
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
}
