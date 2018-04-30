<?php

namespace Objects\Models;

abstract class model
{
    abstract function to_entity();
    /*
     * $entity = new entity();
     * $entity->setField($this->field);
     * return entity;
     */
}


?>
