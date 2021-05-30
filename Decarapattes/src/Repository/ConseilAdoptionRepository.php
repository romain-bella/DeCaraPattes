<?php

namespace App\Repository;

use App\Entity\ConseilAdoption;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConseilAdoption|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConseilAdoption|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConseilAdoption[]    findAll()
 * @method ConseilAdoption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConseilAdoptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConseilAdoption::class);
    }

    // /**
    //  * @return ConseilAdoption[] Returns an array of ConseilAdoption objects
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
    public function findOneBySomeField($value): ?ConseilAdoption
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
