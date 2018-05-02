<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 13:45
 */

namespace Tests;

use const Core\ROOT;

abstract class tests
{
    const courses = 'courses';
    const users = 'users';

    static function run($type) {
        load(ROOT.'\Tests\\'.$type.'_tests.php');
    }
}