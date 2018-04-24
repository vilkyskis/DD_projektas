<?php

namespace App\Repository;

use App\Entity\ServicesSubCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
<<<<<<< HEAD
 * @method ServicesSubCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServicesSubCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServicesSubCategory[]    findAll()
 * @method ServicesSubCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
=======
 * @method ServicesSubCategoryRepository|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServicesSubCategoryRepository|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServicesSubCategoryRepository[]    findAll()
 * @method ServicesSubCategoryRepository[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

>>>>>>> ownerPartV1
class ServicesSubCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ServicesSubCategory::class);
    }

//    /**
<<<<<<< HEAD
//     * @return ServicesSubCategory[] Returns an array of ServicesSubCategory objects
=======
//     * @return BetterService[] Returns an array of BetterService objects
>>>>>>> ownerPartV1
//     */
    /*
    public function findByExampleField($value)
    {
<<<<<<< HEAD
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
=======
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
>>>>>>> ownerPartV1
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
<<<<<<< HEAD
    public function findOneBySomeField($value): ?ServicesSubCategory
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
=======
    public function findOneBySomeField($value): ?BetterService
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
>>>>>>> ownerPartV1
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
<<<<<<< HEAD
}
=======
}
>>>>>>> ownerPartV1
