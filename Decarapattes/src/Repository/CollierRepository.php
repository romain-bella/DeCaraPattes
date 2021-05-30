<?php

namespace App\Repository;

use App\Entity\Collier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Collier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Collier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Collier[]    findAll()
 * @method Collier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CollierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Collier::class);
    }

    // /**
    //  * @return Collier[] Returns an array of Collier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Collier
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
