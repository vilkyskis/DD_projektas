<?php

namespace App\Repository;

use App\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
<<<<<<< HEAD
 * @method Car|null find($id, $lockMode = null, $lockVersion = null)
 * @method Car|null findOneBy(array $criteria, array $orderBy = null)
 * @method Car[]    findAll()
 * @method Car[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
=======
 * @method CarRepository|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarRepository|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarRepository[]    findAll()
 * @method CarRepository[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
>>>>>>> ownerPartV1
 */
class CarRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Car::class);
    }

//    /**
<<<<<<< HEAD
//     * @return Car[] Returns an array of Car objects
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
    public function findOneBySomeField($value): ?Car
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
