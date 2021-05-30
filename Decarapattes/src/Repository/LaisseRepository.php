<?php

namespace App\Repository;

use App\Entity\Laisse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Laisse|null find($id, $lockMode = null, $lockVersion = null)
 * @method Laisse|null findOneBy(array $criteria, array $orderBy = null)
 * @method Laisse[]    findAll()
 * @method Laisse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LaisseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Laisse::class);
    }

    // /**
    //  * @return Laisse[] Returns an array of Laisse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Laisse
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
