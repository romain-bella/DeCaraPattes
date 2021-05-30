<?php

namespace App\Repository;

use App\Entity\VisitePromenade;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VisitePromenade|null find($id, $lockMode = null, $lockVersion = null)
 * @method VisitePromenade|null findOneBy(array $criteria, array $orderBy = null)
 * @method VisitePromenade[]    findAll()
 * @method VisitePromenade[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VisitePromenadeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VisitePromenade::class);
    }

    // /**
    //  * @return VisitePromenade[] Returns an array of VisitePromenade objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VisitePromenade
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
