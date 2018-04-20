<?php

namespace Database\Repositories;

abstract class repository
{
    protected $model;
    protected $entity;

    function __construct()
    {
        $this->entity();
    }

    abstract protected function entity();

    abstract function save($_model);

    abstract function update($_model, $_new_model);

    abstract function destroy($_model);
}

?>
