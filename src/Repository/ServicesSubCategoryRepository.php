<?php

namespace App\Repository;

use App\Entity\ServicesSubCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ServicesSubCategoryRepository|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServicesSubCategoryRepository|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServicesSubCategoryRepository[]    findAll()
 * @method ServicesSubCategoryRepository[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class ServicesSubCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ServicesSubCategory::class);
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