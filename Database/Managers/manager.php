<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-29
 * Time: 09:48
 */

namespace Database\Managers;

abstract class manager
{
    abstract function find($model);

//    abstract function find_all($model);

    abstract function fetch_all();  // implemented in repo

    abstract function save($model);

    abstract function save_all(array $models);

    abstract function update($unique_id, $model);

    abstract function destroy($model);

    abstract function destroy_all();
}