<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-26
 * Time: 19:02
 */

namespace Controllers;


use Services\globals;

class ajax_controller extends controller
{
    function save_competence() {
        require_once globals::get('VIEWS').'/ajax/save_competence.php';
    }

    function home()
    {
        return '/';
    }

}