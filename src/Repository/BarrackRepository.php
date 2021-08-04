<?php

namespace App\Repository;

use App\Entity\Barrack;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Barrack|null find($id, $lockMode = null, $lockVersion = null)
 * @method Barrack|null findOneBy(array $criteria, array $orderBy = null)
 * @method Barrack[]    findAll()
 * @method Barrack[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BarrackRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Barrack::class);
    }

    // /**
    //  * @return Barrack[] Returns an array of Barrack objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Barrack
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
