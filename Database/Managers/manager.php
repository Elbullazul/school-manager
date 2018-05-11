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
    protected $repository;

    abstract function __construct();

    abstract function find($model);

    abstract function fetch_all();

    function save($model)
    {
        $ret = $this->repository->save($model);

        return $ret;
    }

    function save_all(array $models)
    {
        $ret = [];

        foreach ($models as $model) {
            $ret[] = $this->repository->save($model);
        }

        return $ret;
    }

    abstract function update($unique_id, $model);

    function destroy($model)
    {
        $ret = $this->repository->destroy('id', $model->getId());

        return $ret;
    }

    function destroy_all()
    {
        $ret = $this->repository->destroy_all();

        return $ret;
    }
}