<?php

use Services\users;
use Services\links;

users::disconnect();
redirect(links::get('login'));