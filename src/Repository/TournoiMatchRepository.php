<?php

namespace App\Repository;

use App\Entity\TournoiMatch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TournoiMatch|null find($id, $lockMode = null, $lockVersion = null)
 * @method TournoiMatch|null findOneBy(array $criteria, array $orderBy = null)
 * @method TournoiMatch[]    findAll()
 * @method TournoiMatch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TournoiMatchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TournoiMatch::class);
    }

    // /**
    //  * @return TournoiMatch[] Returns an array of TournoiMatch objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TournoiMatch
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
