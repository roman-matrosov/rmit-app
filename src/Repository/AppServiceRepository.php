<?php

namespace App\Repository;

use App\Entity\AppService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AppService|null find($id, $lockMode = null, $lockVersion = null)
 * @method AppService|null findOneBy(array $criteria, array $orderBy = null)
 * @method AppService[]    findAll()
 * @method AppService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AppService::class);
    }

    // /**
    //  * @return AppService[] Returns an array of Test objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('as')
            ->andWhere('as.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('as.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AppService
    {
        return $this->createQueryBuilder('as')
            ->andWhere('as.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
