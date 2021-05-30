<?php

namespace App\Repository;

use App\Entity\BaladeEducative;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BaladeEducative|null find($id, $lockMode = null, $lockVersion = null)
 * @method BaladeEducative|null findOneBy(array $criteria, array $orderBy = null)
 * @method BaladeEducative[]    findAll()
 * @method BaladeEducative[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BaladeEducativeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BaladeEducative::class);
    }

    // /**
    //  * @return BaladeEducative[] Returns an array of BaladeEducative objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BaladeEducative
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
