<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 11:33
 */

namespace Objects\Factories;

use Objects\Models\user_model;

abstract class users_factory extends factory
{
    static function construct_empty()
    {
        return new user_model();
    }

    static function construct(array $bundle)
    {
        if (count($bundle) == 4) {
            $model = new user_model();
            $model->setUserId($bundle['user_id']);
            $model->setUserType($bundle['user_type']);
            $model->setUsername($bundle['username']);
            $model->setPassword($bundle['password']);

            return $model;
        } else {
            return NULL;
        }
    }

}