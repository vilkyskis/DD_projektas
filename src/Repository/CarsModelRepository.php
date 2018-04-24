<?php

namespace App\Repository;

use App\Entity\CarsModel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CarsModelRepository|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarsModelRepository|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarsModelRepository[]    findAll()
 * @method CarsModelRepository[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarsModelRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CarsModel::class);
    }

//    /**
//     * @return BetterService[] Returns an array of BetterService objects
//     */
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
    public function findOneBySomeField($value): ?BetterService
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