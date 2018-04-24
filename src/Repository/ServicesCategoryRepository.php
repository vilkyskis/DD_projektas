<?php

namespace App\Repository;

use App\Entity\ServicesCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
<<<<<<< HEAD
 * @method ServicesCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServicesCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServicesCategory[]    findAll()
 * @method ServicesCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
=======
 * @method ServicesCategoryRepository|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServicesCategoryRepository|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServicesCategoryRepository[]    findAll()
 * @method ServicesCategoryRepository[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

>>>>>>> ownerPartV1
class ServicesCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ServicesCategory::class);
    }

//    /**
<<<<<<< HEAD
//     * @return ServicesCategory[] Returns an array of ServicesCategory objects
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
    public function findOneBySomeField($value): ?ServicesCategory
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
