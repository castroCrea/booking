<?php
/**
 * Created by PhpStorm.
 * User: paolocastro
 * Date: 05/03/2018
 * Time: 18:06
 */

namespace App\Validator\Constraints\DateOrder;

use App\Validator\Constraints\DatePast\DatePastProperties;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Class DateOrderPropertiesValidator
 * @package App\Validator\Constraints\DateOrder
 */
class DateOrderPropertiesValidator extends ConstraintValidator
{
    /**
     * send error if date of departure is low than date of arrival
     * only on Arrival Data (Bookings Entity)
     *
     * @param mixed $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        $date = $value;
        $departurDate = $this->context->getObject()->getDepartureDate();

        if($date > $departurDate) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}