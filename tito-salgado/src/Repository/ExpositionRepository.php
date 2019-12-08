<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use App\Entity\Exposition;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Exposition|null find($id, $lockMode = null, $lockVersion = null)
 * @method Exposition|null findOneBy(array $criteria, array $orderBy = null)
 * @method Exposition[]    findAll()
 * @method Exposition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExpositionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Exposition::class);
    }


    public function getExposition():Query
    {
        $query = $this->createQueryBuilder('exposition')
                ->select('exposition')
                ->where('exposition.date > CURRENT_TIMESTAMP()')
                ->getQuery()
        ;
        return $query;

    }

    // /**
    //  * @return Exposition[] Returns an array of Exposition objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Exposition
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
