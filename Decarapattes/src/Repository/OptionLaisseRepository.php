<?php

namespace App\Repository;

use App\Entity\OptionLaisse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OptionLaisse|null find($id, $lockMode = null, $lockVersion = null)
 * @method OptionLaisse|null findOneBy(array $criteria, array $orderBy = null)
 * @method OptionLaisse[]    findAll()
 * @method OptionLaisse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptionLaisseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OptionLaisse::class);
    }

    // /**
    //  * @return OptionLaisse[] Returns an array of OptionLaisse objects
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
    public function findOneBySomeField($value): ?OptionLaisse
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
