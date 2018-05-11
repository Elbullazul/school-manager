<?php
/**
 * Created by PhpStorm.
 * User: crime
 * Date: 2018-05-11
 * Time: 11:31
 */

namespace Objects\Factories;

use Objects\Models\evaluation_competence_model;

class evaluations_competences_factory extends factory
{
    static function construct_empty()
    {
        return new evaluation_competence_model();
    }

    static function construct(array $bundle)
    {
        if (count($bundle) == 3) {
            $model = new evaluation_competence_model();
            $model->setPonderation($bundle['ponderation']);
            $model->setEvaluationId($bundle['evaluation_id']);
            $model->setCompetenceId($bundle['competence_id']);

            return $model;
        } else {
            return NULL;
        }
    }

}