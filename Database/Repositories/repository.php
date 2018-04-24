<?php

namespace Database\Repositories;

use \PDO;
use Database\connection;

abstract class repository
{
    protected $table;
    protected $entity;

    abstract function __construct();

    abstract function find($field, $value);

    abstract function save($_model);

    abstract function update($_model, $_new_model);

    abstract function destroy($_model);

    function fetch_all()
    {
        $Cnn = connection::getInstance();
        $cmd = "SELECT *
            FROM $this->table";

        $table_data = $Cnn->prepare($cmd);

        $table_data->setFetchMode(PDO::FETCH_CLASS, $this->entity, array());
        $table_data->execute();
        $data = $table_data->fetchAll();

        if (!$data) {
            $data = new $this->entity();
        }

        return $data;
    }
}

?>
