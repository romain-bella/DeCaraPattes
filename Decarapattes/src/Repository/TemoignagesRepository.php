<?php

namespace App\Repository;

use App\Entity\Temoignages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Temoignages|null find($id, $lockMode = null, $lockVersion = null)
 * @method Temoignages|null findOneBy(array $criteria, array $orderBy = null)
 * @method Temoignages[]    findAll()
 * @method Temoignages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TemoignagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Temoignages::class);
    }

    // /**
    //  * @return Temoignages[] Returns an array of Temoignages objects
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
    public function findOneBySomeField($value): ?Temoignages
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
