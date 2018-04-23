<?php

use Core\security;
use Services\labels;

// Show connecting message in case of slow connection
echo labels::get('@PA02');

$pw = \Services\posts::get("inputPassword");
$usr = \Services\posts::get("inputUser");

security::authenticate(array("username" => $usr, "password" => $pw));