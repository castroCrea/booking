<?php
/**
 * Created by PhpStorm.
 * User: paolocastro
 * Date: 05/03/2018
 * Time: 18:06
 */

namespace App\Validator\Constraints\PaxRoom;

use App\Validator\Constraints\DatePast\DatePastProperties;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Class PaxRoomPropertiesValidator
 * @package App\Validator\Constraints\PaxRoom
 */
class PaxRoomPropertiesValidator extends ConstraintValidator
{
    /**
     * look if the number of pax is not higher than the available sleep un the room
     *
     * @param mixed $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        $availableSleep = $this->context->getObject()->getRoom()->getAvailableSleeps();

        if($availableSleep < $value) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}