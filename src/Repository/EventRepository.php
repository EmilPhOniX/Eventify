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
        $currentDate = new \DateTime();

        return $this->createQueryBuilder('e')
            ->where('e.date > :currentDate')
            ->setParameter('currentDate', $currentDate)
            ->orderBy('e.date', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupérer les événements filtrés par date
     */
    public function findByDateRange(?string $startDate, ?string $endDate): array
    {
        $qb = $this->createQueryBuilder('e');

        if ($startDate) {
            $qb->andWhere('e.date >= :startDate')
                ->setParameter('startDate', new \DateTime($startDate));
        }

        if ($endDate) {
            $qb->andWhere('e.date <= :endDate')
                ->setParameter('endDate', new \DateTime($endDate));
        }

        return $qb->orderBy('e.date', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
