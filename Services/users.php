<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-17
 * Time: 13:00
 */

namespace Services;


use Core\security;

abstract class users
{
    static function connect($user_model)
    {
        sessions::set('username', $user_model->getUsername());
        sessions::set('type', $user_model->getUserType()->getType());
        sessions::set('privileges', $user_model->getUserType()->getAccessLevel());
    }

    static function connected()
    {
        return sessions::is_set('username');
    }

    static function username() {
        return sessions::get('username');
    }

    static function type() {
        return sessions::get('type');
    }

    static function privileges()
    {
        if(self::connected())
            return sessions::get('privileges');
        else
            return security::PRIVILEGES['PUBLIC'];
    }

    static function disconnect()
    {
        sessions::destroy('username');
        sessions::destroy('type');
        sessions::destroy('privileges');
    }
}