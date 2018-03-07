<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiProperty;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoomRepository")
 * @ApiResource
 * @ApiResource(iri="http://schema.org/HotelRoom, http://schema.org/BedDetails")
 */
class Rooms
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank
     * @Assert\Type("integer")
     *
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @Assert\Type("integer")
     * @var integer|null
     * @ORM\Column(type="integer", nullable=true)
     */
    private $floor;

    /**
     * @ApiProperty(iri="http://schema.org/numberOfBeds")
     * @Assert\Type("integer")
     * @var integer|null
     * @ORM\Column(type="integer", nullable=true)
     */
    private $availableSleeps;

    /**
     * @Assert\Type("float")
     * @var float|null
     * @ORM\Column(type="float", nullable=true)
     */
    private $price;

    /**
     * @ApiProperty(iri="http://schema.org/description")
     * @var string|null
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @var Bookings[]
     * One Room has Many Bookings.
     * @ORM\OneToMany(targetEntity="Bookings", mappedBy="room")
     */
    private $bookings;

    /**
     * Rooms constructor.
     */
    public function __construct()
    {
        $this->bookings = new ArrayCollection();
    }

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
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * @param mixed $floor
     */
    public function setFloor($floor): void
    {
        $this->floor = $floor;
    }

    /**
     * @return mixed
     */
    public function getAvailableSleeps()
    {
        return $this->availableSleeps;
    }

    /**
     * @param mixed $availableSleeps
     */
    public function setAvailableSleeps($availableSleeps): void
    {
        $this->availableSleeps = $availableSleeps;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getBookings()
    {
        return $this->bookings;
    }

    /**
     * @param Bookings $bookings
     * @return Bookings
     */
    public function addBookings(Bookings $bookings){
        $this->bookings[] = $bookings;
        return $bookings;
    }

    /**
     * @param Bookings $bookings
     */
    public function removeBooking(Bookings $bookings)
    {
        $this->bookings->removeElement($bookings) ;
    }
}
