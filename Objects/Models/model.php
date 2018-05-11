<?php

namespace Objects\Models;

use \JsonSerializable;
use Objects\Interfaces\entitizable;

abstract class model implements entitizable, JsonSerializable
{
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}