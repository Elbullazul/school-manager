<?php

use Services\users;

users::disconnect();

redirect('login');