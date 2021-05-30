<?php

namespace App\Repository;

use App\Entity\OptionCollier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OptionCollier|null find($id, $lockMode = null, $lockVersion = null)
 * @method OptionCollier|null findOneBy(array $criteria, array $orderBy = null)
 * @method OptionCollier[]    findAll()
 * @method OptionCollier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptionCollierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OptionCollier::class);
    }

    // /**
    //  * @return OptionCollier[] Returns an array of OptionCollier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OptionCollier
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
