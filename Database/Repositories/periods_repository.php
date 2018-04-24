<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-24
 * Time: 13:11
 */

namespace Database\Repositories;

use \PDO;
use Database\connection;
use Database\Entities\period_entity;

class periods_repository extends repository
{
    public function __construct()
    {
        $this->table = "periods";
        $this->entity = period_entity::class;
    }

    function find($field, $value)
    {
        // TODO: Implement find() method.
    }

    function save($_model)
    {
        // TODO: Implement save() method.
    }

    function update($_model, $_new_model)
    {
        // TODO: Implement update() method.
    }

    function destroy($_model)
    {
        // TODO: Implement destroy() method.
    }

}