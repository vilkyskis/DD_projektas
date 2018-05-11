<?php

namespace App\Repository;

use App\Entity\CarsModel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CarsModel|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarsModel|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarsModel[]    findAll()
 * @method CarsModel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarsModelRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CarsModel::class);
    }
}
