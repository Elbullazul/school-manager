<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-04-30
 * Time: 08:28
 */

namespace Objects\Factories;

abstract class factory
{
    abstract static function construct_empty();

    abstract static function construct(array $bundle);

    abstract static function construct_from_entity($entity);

    abstract static function construct_from_entities(array $entities);
}