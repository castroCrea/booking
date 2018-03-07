<?php
/**
 * Created by PhpStorm.
 * User: paolocastro
 * Date: 05/03/2018
 * Time: 18:06
 */

namespace App\Validator\Constraints;

use App\Validator\Constraints\DatePastProperties;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class DatePastPropertiesValidator extends ConstraintValidator
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function validate($value, Constraint $constraint)
    {
        $date = $value;
        $now = new \DateTime();

        if($date < $now) {
            $this->context->buildViolation($constraint->messageDatePast)->addViolation();
        }
//
//        var_dump($this->context->getObject()->getDepartureDate());
//        var_dump($value);
    }
}