<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-17
 * Time: 13:50
 */

namespace Core;

use Database\Repositories\users_repository;
use Database\Repositories\user_types_repository;
use Services\flashes;
use Services\links;
use Services\users;


abstract class security
{
    static $NAMESPACES = array(
        "USER" => "user",
        "PUBLIC" => "public",
        "MANAGE" => "manage",
        "VIEW" => "view"
    );

    static $PRIVILEGES = array(
        "STUDENT" => 1,
        "TEACHER" => 2,
        "MANAGER" => 3,
        "ADMIN" => 4
    );

    static $CODES = array(
        "NO_AUTH_REQUIRED" => 0,
        "USER_NOT_CONNECTED" => 1,
        "AUTH_SUCCESSFUL" => 2,
        "INSUFFICIENT_PRIVILEGES" => 3
    );

    static function authenticate($bundle)
    {
        if (!empty($bundle["username"]) && !empty($bundle["password"])) {

            // load user entity
            $repo = new users_repository();
            $user = $repo->find('username', $bundle["username"]);

            if (!empty($user)) {
                if ($user->getPassword() == $bundle["password"]) {

                    // load privileges
                    $repo = new user_types_repository();
                    $user_type = $repo->find('type_id', $user->getUserType());

                    if (!empty($user_type)) {
                        users::connect($bundle["username"], $user_type);
                        redirect(links::get('dashboard'));
                    } else {
                        error('@SYS05');
                    }
                } else {
                    flashes::set('@UI18', flashes::$DANGER);
                    redirect(links::get('login'));
                }
            } else {
                error("@SYS05");
            }
        } else {
            flashes::set('@UI18', flashes::$DANGER);
            redirect(links::get('login'));
        }
    }

    static function access() {
        if (!users::connected())
            redirect(links::get('login'));
    }
}