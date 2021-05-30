<?php

namespace App\Repository;

use App\Entity\Croquette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Croquette|null find($id, $lockMode = null, $lockVersion = null)
 * @method Croquette|null findOneBy(array $criteria, array $orderBy = null)
 * @method Croquette[]    findAll()
 * @method Croquette[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CroquetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Croquette::class);
    }

    // /**
    //  * @return Croquette[] Returns an array of Croquette objects
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
    public function findOneBySomeField($value): ?Croquette
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
