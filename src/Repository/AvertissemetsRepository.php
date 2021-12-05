<?php

namespace App\Repository;

use App\Entity\Avertissemets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Avertissemets|null find($id, $lockMode = null, $lockVersion = null)
 * @method Avertissemets|null findOneBy(array $criteria, array $orderBy = null)
 * @method Avertissemets[]    findAll()
 * @method Avertissemets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvertissemetsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Avertissemets::class);
    }

    // /**
    //  * @return Avertissemets[] Returns an array of Avertissemets objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Avertissemets
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
