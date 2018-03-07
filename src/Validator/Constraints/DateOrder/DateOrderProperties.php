<?php
/**
 * Created by PhpStorm.
 * User: paolocastro
 * Date: 05/03/2018
 * Time: 18:00
 */

namespace App\Validator\Constraints\DateOrder;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class DateOrderProperties extends Constraint
{
    /**
     * @var string
     */
    public $message = 'The departured date is earlier than the arrival date';
}