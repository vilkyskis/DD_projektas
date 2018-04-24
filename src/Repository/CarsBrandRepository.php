<?php

namespace App\Repository;

use App\Entity\CarsBrand;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
<<<<<<< HEAD
 * @method CarsBrand|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarsBrand|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarsBrand[]    findAll()
 * @method CarsBrand[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
=======
 * @method CarsBrandRepository|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarsBrandRepository|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarsBrandRepository[]    findAll()
 * @method CarsBrandRepository[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
>>>>>>> ownerPartV1
 */
class CarsBrandRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CarsBrand::class);
    }

//    /**
<<<<<<< HEAD
//     * @return CarsBrand[] Returns an array of CarsBrand objects
=======
//     * @return BetterService[] Returns an array of BetterService objects
>>>>>>> ownerPartV1
//     */
    /*
    public function findByExampleField($value)
    {
<<<<<<< HEAD
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
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
    public function findOneBySomeField($value): ?CarsBrand
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
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
