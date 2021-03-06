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

/**
 * Class DatePastPropertiesValidator
 * @package App\Validator\Constraints\DatePast
 */
class DatePastPropertiesValidator extends ConstraintValidator
{
    /**
     * look if the time is not past
     *
     * @param mixed $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        $date = $value;
        $now = new \DateTime();

        if($date < $now) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}