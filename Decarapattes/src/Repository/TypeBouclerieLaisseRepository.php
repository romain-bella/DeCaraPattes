<?php

namespace App\Repository;

use App\Entity\TypeBouclerieLaisse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeBouclerieLaisse|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeBouclerieLaisse|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeBouclerieLaisse[]    findAll()
 * @method TypeBouclerieLaisse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeBouclerieLaisseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeBouclerieLaisse::class);
    }

    // /**
    //  * @return TypeBouclerieLaisse[] Returns an array of TypeBouclerieLaisse objects
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
    public function findOneBySomeField($value): ?TypeBouclerieLaisse
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
