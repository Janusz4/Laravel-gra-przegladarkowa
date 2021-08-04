<?php

namespace App\Repository;

use App\Entity\Sawmill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sawmill|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sawmill|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sawmill[]    findAll()
 * @method Sawmill[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SawmillRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sawmill::class);
    }

    // /**
    //  * @return Sawmill[] Returns an array of Sawmill objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sawmill
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
