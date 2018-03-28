<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiProperty;
use App\Validator\Constraints\DatePast\DatePastProperties;
use App\Validator\Constraints\DateBooking\DateBookingProperties;
use App\Validator\Constraints\DateOrder\DateOrderProperties;
use App\Validator\Constraints\PaxRoom\PaxRoomProperties;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookingsRepository")
 * @ApiResource
 * @ApiResource(iri="http://schema.org/Reservation")
 */
class Booking
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank
     * @var Room
     * Many Booking have One Room.
     * @ORM\ManyToOne(targetEntity="Room", inversedBy="bookings")
     * @ORM\JoinColumn(name="booking_id", referencedColumnName="id")
     */
    private $room;

    /**
     * @DateOrderProperties
     * @DateBookingProperties
     * @DatePastProperties
     * @ApiProperty(iri="http://schema.org/bookingTime")
     * @Assert\NotBlank
     * @Assert\DateTime()
     * @var \DateTimeInterface
     * @ORM\Column(type="datetime")
     */
    private $arrivalDate;

    /**
     * @DatePastProperties
     * @ApiProperty(iri="http://schema.org/name")
     * @Assert\NotBlank
     * @Assert\DateTime()
     * @var \DateTimeInterface
     * @ORM\Column(type="datetime")
     */
    private $departureDate;

    /**
     * @Assert\Type("boolean")
     * @var boolean|null
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $breakfast;

    /**
     * @PaxRoomProperties
     * @Assert\Type("integer")
     * @Assert\NotBlank
     * @var integer|null
     * @ORM\Column(type="integer")
     */
    private $numberOfPax;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param mixed $room
     */
    public function setRoom($room): void
    {
        $this->room = $room;
    }

    /**
     * @return mixed
     */
    public function getArrivalDate()
    {
        return $this->arrivalDate;
    }

    /**
     * @param mixed $arrivalDate
     */
    public function setArrivalDate($arrivalDate): void
    {
        $this->arrivalDate = $arrivalDate;
    }

    /**
     * @return mixed
     */
    public function getDepartureDate()
    {
        return $this->departureDate;
    }

    /**
     * @param mixed $departureDate
     */
    public function setDepartureDate($departureDate): void
    {
        $this->departureDate = $departureDate;
    }

    /**
     * @return mixed
     */
    public function getBreakfast()
    {
        return $this->breakfast;
    }

    /**
     * @param mixed $breakfast
     */
    public function setBreakfast($breakfast): void
    {
        $this->breakfast = $breakfast;
    }

    /**
     * @return mixed
     */
    public function getNumberOfPax()
    {
        return $this->numberOfPax;
    }

    /**
     * @param mixed $numberOfPax
     */
    public function setNumberOfPax($numberOfPax): void
    {
        $this->numberOfPax = $numberOfPax;
    }
}
