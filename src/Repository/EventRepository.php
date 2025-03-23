<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

/**
 * @extends ServiceEntityRepository<Event>
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    /**
     * Récupérer les événements à venir
     */
    public function findUpcomingEvents(): array
    {
        // Créer la requête pour obtenir les événements dont la date est supérieure à la date actuelle
        $currentDate = new \DateTime();

        return $this->createQueryBuilder('e')
            ->where('e.date > :currentDate')
            ->setParameter('currentDate', $currentDate)
            ->orderBy('e.date', 'ASC')
            ->getQuery()
            ->getResult();
    }
}