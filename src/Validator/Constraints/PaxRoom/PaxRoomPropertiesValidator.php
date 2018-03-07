<?php
/**
 * Created by PhpStorm.
 * User: paolocastro
 * Date: 05/03/2018
 * Time: 18:06
 */

namespace App\Validator\Constraints\DatePast;

use App\Validator\Constraints\DatePast\DatePastProperties;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class DatePastPropertiesValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        $date = $value;
        $now = new \DateTime();

        if($date < $now) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}