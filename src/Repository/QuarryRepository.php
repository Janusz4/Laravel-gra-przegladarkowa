<?php

namespace App\Repository;

use App\Entity\Quarry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Quarry|null find($id, $lockMode = null, $lockVersion = null)
 * @method Quarry|null findOneBy(array $criteria, array $orderBy = null)
 * @method Quarry[]    findAll()
 * @method Quarry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuarryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Quarry::class);
    }

    // /**
    //  * @return Quarry[] Returns an array of Quarry objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Quarry
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
