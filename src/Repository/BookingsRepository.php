<?php

namespace App\Repository;

use App\Entity\Booking;
use App\Entity\Room;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Booking|null find($id, $lockMode = null, $lockVersion = null)
 * @method Booking|null findOneBy(array $criteria, array $orderBy = null)
 * @method Booking[]    findAll()
 * @method Booking[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookingsRepository extends ServiceEntityRepository
{
    /**
     * BookingsRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Booking::class);
    }

    /**
     * The purpose is to get all the booking in between those date for a room
     * It's use to know if the rooms are free or not
     * If there is booking it's not free
     * We take all bookings with a arrival date who is in between same arrival date and strictly under the departure Date
     * We take all bookings with a departure date who is in between same departure date and strictly upper the arrival Date (the can depart on arrival date)
     *
     * @param \DateTime $arrivalDate
     * @param \DateTime $departurDate
     * @param Room $room
     * @return mixed
     */
    public function findByDateRangeForRoom(\DateTime $arrivalDate, \DateTime $departureDate, Room $room)
    {
        // Here we clone the date to don't modify the value of the object in anycase
        $arrivalDateClone = clone $arrivalDate;
        $departureDateClone = clone $departureDate;

        $return = $this->createQueryBuilder('b')
            ->where('(b.arrivalDate >= :arrivalDate AND b.arrivalDate < :departureDate) OR (b.departureDate > :arrivalDate AND b.departureDate <= :departureDate)')
            ->andWhere('b.room = :room')
            ->setParameters([
                'arrivalDate' => $arrivalDateClone,
                'departureDate' => $departureDateClone,
                'room' => $room,
            ])
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
        return $return;

    }
}
