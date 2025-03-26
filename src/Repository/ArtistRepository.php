<?php

namespace App\Repository;

use App\Entity\Artist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ArtistRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Artist::class);
    }

    public function searchByName(?string $name): array
    {
        $qb = $this->createQueryBuilder('a');

        if ($name) {
            $qb->andWhere('a.name LIKE :name')
                ->setParameter('name', '%' . $name . '%');
        }

        return $qb->getQuery()->getResult();
    }
}
