<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 13:35
 */

use Objects\Models\user_model;
use Database\Managers\users_manager;

// Test user loading data
$user = new user_model();
$user->setUserId(1);
$user->setUserType(4);

$users_manager = new users_manager();
$user_constructed = $users_manager->find($user);

dump($user_constructed);

// Test user loading data from username
$second_user = new user_model();
$second_user->setUsername('root');
$second_user->setPassword('admin');

$second_user_constructed = $users_manager->find_by_username($second_user);
dump($second_user_constructed);

// password check
dump($second_user_constructed->check_user_password($user));     // False
$second_user_constructed->setPassword(NULL);
dump($second_user_constructed->check_user_password($user));     // True