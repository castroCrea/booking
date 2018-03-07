<?php
/**
 * Created by PhpStorm.
 * User: paolocastro
 * Date: 05/03/2018
 * Time: 18:00
 */

namespace App\Validator\Constraints\PaxRoom;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class PaxRoomProperties extends Constraint
{
    public $message = 'The pax is higher than the room capacity';
}