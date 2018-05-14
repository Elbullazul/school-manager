<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-17
 * Time: 13:50
 */

namespace Core;

use Database\Managers\users_manager;
use Services\access_registry;
use Services\flashes;
use Services\links;
use Services\users;


abstract class security
{
    const PRIVILEGES = array(
        "STUDENT" => 1,
        "TEACHER" => 2,
        "MANAGER" => 3,
        "ADMIN" => 4
    );

    const CODES = array(
        "NO_AUTH_REQUIRED" => 0,
        "USER_NOT_CONNECTED" => 1,
        "AUTH_SUCCESSFUL" => 2,
        "INSUFFICIENT_PRIVILEGES" => 3
    );

    static function authenticate($user_submitted_model)
    {
        $user_manager = new users_manager();
        $user_model = $user_manager->find_by_username($user_submitted_model);

        if (!empty($user_model)) {
            if ($user_model->check_user_password($user_submitted_model)) {
                if (!is_null($user_model->getUserType())) {
                    users::connect($user_model);
                } else {
                    error('@SYS05');
                }
            } else {
                flashes::set('@UI18', flashes::DANGER);
                redirect(links::get('login'));
            }
        } else {
            error("@SYS05");    // @SYS02
        }
    }

    static function access()
    {
        if (!users::connected()) {
            redirect(links::get('login'));
        }
    }

    static function authorize($tag)
    {
        $view_tag = links::get_tag($tag);
        $has_access = access_registry::find($view_tag);

        if (!$has_access) {
            flashes::set('@UI46', flashes::DANGER, true);
            redirect(links::get('dashboard'));
        }
    }
}