<?php
/**
 * Created by PhpStorm.
 * User: paolocastro
 * Date: 05/03/2018
 * Time: 18:00
 */

namespace App\Validator\Constraints\DateBooking;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class DateBookingProperties extends Constraint
{
    public $message = 'The Room is not avalable at this date';
    public $messageFormat = 'Wrong date format';
}