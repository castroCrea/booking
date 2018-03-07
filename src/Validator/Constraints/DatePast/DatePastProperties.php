<?php
/**
 * Created by PhpStorm.
 * User: paolocastro
 * Date: 05/03/2018
 * Time: 18:00
 */

namespace App\Validator\Constraints\DatePast;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class DatePastProperties extends Constraint
{
    public $message = 'The date selected is past';
}