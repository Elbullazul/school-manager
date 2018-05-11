<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-04
 * Time: 10:53
 */

namespace Objects\Factories;

use Objects\Models\person_model;

abstract class persons_factory extends factory
{
    static function construct_empty()
    {
        return new person_model();
    }

    static function construct(array $bundle)
    {
        if (count($bundle) == 6) {
            $model = new person_model();
            $model->setId($bundle['id']);
            $model->setTelephoneNumber($bundle['telephone_number']);
            $model->setFirstName($bundle['first_name']);
            $model->setLastName($bundle['last_name']);
            $model->setBirthdate($bundle['birthdate']);
            $model->setSex($bundle['sex']);

            return $model;
        } else {
            return NULL;
        }
    }

    static function fill_model(&$model, $person_model) {
        $model->setPersonId($person_model->getId());
        $model->setTelephoneNumber($person_model->getTelephoneNumber());
        $model->setFirstName($person_model->getFirstName());
        $model->setLastName($person_model->getLastName());
        $model->setBirthdate($person_model->getBirthdate());
        $model->setSex($person_model->getSex());
    }
}