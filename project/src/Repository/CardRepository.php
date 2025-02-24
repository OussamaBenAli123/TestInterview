<?php

namespace App\Repository;

use App\Entity\Card;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Card>
 */
class CardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Card::class);
    }

    public function getCards()
    {
        $cards = $this->createQueryBuilder('c')
            ->getQuery()
            ->getResult();

        shuffle($cards);

        return array_slice($cards, 0, 10);
    }

    public function sortCards(array $ids)
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.colorOrder', 'asc')
            ->addOrderBy('c.valueOrder', 'asc')
            ->where('c.id IN (:ids)')
            ->setParameter('ids', $ids)
            ->getQuery()
            ->getResult();
    }
}
