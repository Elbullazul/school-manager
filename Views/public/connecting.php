<?php

use Core\security;

$pw = \Services\posts::get("inputPassword");
$usr = \Services\posts::get("inputUser");

security::authenticate(array("username" => $usr, "password" => $pw));