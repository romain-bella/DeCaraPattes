<?php

namespace App\Repository;

use App\Entity\RecreeChiot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecreeChiot|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecreeChiot|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecreeChiot[]    findAll()
 * @method RecreeChiot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecreeChiotRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecreeChiot::class);
    }

    // /**
    //  * @return RecreeChiot[] Returns an array of RecreeChiot objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RecreeChiot
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
