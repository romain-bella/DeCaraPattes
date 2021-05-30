<?php

namespace App\Repository;

use App\Entity\HygieneEtSoin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HygieneEtSoin|null find($id, $lockMode = null, $lockVersion = null)
 * @method HygieneEtSoin|null findOneBy(array $criteria, array $orderBy = null)
 * @method HygieneEtSoin[]    findAll()
 * @method HygieneEtSoin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HygieneEtSoinRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HygieneEtSoin::class);
    }

    // /**
    //  * @return HygieneEtSoin[] Returns an array of HygieneEtSoin objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HygieneEtSoin
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
