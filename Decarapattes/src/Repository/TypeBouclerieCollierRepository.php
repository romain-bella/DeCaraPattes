<?php

namespace App\Repository;

use App\Entity\TypeBouclerieCollier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeBouclerieCollier|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeBouclerieCollier|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeBouclerieCollier[]    findAll()
 * @method TypeBouclerieCollier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeBouclerieCollierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeBouclerieCollier::class);
    }

    // /**
    //  * @return TypeBouclerieCollier[] Returns an array of TypeBouclerieCollier objects
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
    public function findOneBySomeField($value): ?TypeBouclerieCollier
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
