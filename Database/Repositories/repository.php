<?php

namespace Database\Repositories;

use Database\query_builder;

abstract class repository
{
    protected $table;
    protected $entity;

    abstract function __construct();

    abstract function find($field, $value);

    abstract function find_all($field, $value);

    abstract function save($model);

    abstract function update($field, $value, $model);

    function destroy($field, $value) {
        $engine = new query_builder($this->entity, query_builder::EXECUTE);
        $engine->delete($this->table)->where($field.' = '.$value);
        $ret = $engine->execute();

        return $ret;
    }

    function destroy_all() {
        $engine = new query_builder($this->entity, query_builder::EXECUTE);
        $engine->delete($this->table);
        $ret = $engine->execute();

        return $ret;
    }

    function fetch_all()
    {
        $engine = new query_builder($this->entity, query_builder::FETCH_ALL);
        $engine->select('*')->from($this->table);
        $ret = $engine->execute();

        return $ret;
    }

    function get_last_id()
    {
        $engine = new query_builder($this->entity, query_builder::FETCH);
        $engine->select('id')->from($this->table)->order_by('date_created')->desc()->limit(1);
        $ret = $engine->execute();

        // TODO: is this OK?
        return $ret->getId();
    }
}

?>
