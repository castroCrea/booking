<?php
/**
 * Created by PhpStorm.
 * User: paolocastro
 * Date: 05/03/2018
 * Time: 18:06
 */

namespace App\Validator\Constraints\DateBooking;

use App\Entity\Booking;
use App\Validator\Constraints\DateBooking\DateBookingProperties;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Class DateBookingPropertiesValidator
 * @package App\Validator\Constraints\DateBooking
 */
class DateBookingPropertiesValidator extends ConstraintValidator
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * DateBookingPropertiesValidator constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * user only on dateArrival (Entity Booking)
     * We look the format on the value
     * we check here if the room is available at this date buy taking all the booking form this date and looking if there is a booking
     *
     * @param mixed $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$value instanceof \DateTime) {
            $this->context->buildViolation($constraint->messageFormat)->addViolation();
        }

        $arrivalDate = $value;
        $departurDate = $this->context->getObject()->getDepartureDate();
        $room = $this->context->getObject()->getRoom();

        $booking = $this->entityManager->getRepository(Booking::class)->findByDateRangeForRoom($arrivalDate, $departurDate, $room);

        if(!empty($booking)) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}