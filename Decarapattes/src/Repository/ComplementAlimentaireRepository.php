<?php

namespace App\Repository;

use App\Entity\ComplementAlimentaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ComplementAlimentaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method ComplementAlimentaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method ComplementAlimentaire[]    findAll()
 * @method ComplementAlimentaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComplementAlimentaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ComplementAlimentaire::class);
    }

    // /**
    //  * @return ComplementAlimentaire[] Returns an array of ComplementAlimentaire objects
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
    public function findOneBySomeField($value): ?ComplementAlimentaire
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
