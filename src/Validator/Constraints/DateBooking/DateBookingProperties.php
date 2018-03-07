<?php
/**
 * Created by PhpStorm.
 * User: paolocastro
 * Date: 05/03/2018
 * Time: 18:00
 */

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class DatePastProperties extends Constraint
{
    public $message = 'The Rooms is not avalable at this date';
    public $messageDatePast = 'The date selected is past';
}