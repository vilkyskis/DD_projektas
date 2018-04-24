<?php

namespace App\Repository;

use App\Entity\CarsModel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
<<<<<<< HEAD
 * @method CarsModel|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarsModel|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarsModel[]    findAll()
 * @method CarsModel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
=======
 * @method CarsModelRepository|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarsModelRepository|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarsModelRepository[]    findAll()
 * @method CarsModelRepository[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
>>>>>>> ownerPartV1
 */
class CarsModelRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CarsModel::class);
    }

//    /**
<<<<<<< HEAD
//     * @return CarsModel[] Returns an array of CarsModel objects
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
    public function findOneBySomeField($value): ?CarsModel
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
