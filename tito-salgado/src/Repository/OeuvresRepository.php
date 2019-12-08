<?php

namespace App\Repository;

use App\Entity\Oeuvres;
use Doctrine\ORM\Query;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Oeuvres|null find($id, $lockMode = null, $lockVersion = null)
 * @method Oeuvres|null findOneBy(array $criteria, array $orderBy = null)
 * @method Oeuvres[]    findAll()
 * @method Oeuvres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OeuvresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Oeuvres::class);
    }

    public function carousel():Query
    {
        $query = $this->createQueryBuilder('oeuvre')
                ->select('oeuvre')
                ->setMaxResults(3)
                ->orderBy('oeuvre.id', 'ASC')
                ->getQuery()
        ;
        return $query;

    }

    public function getDetailsProduct(int $id):Query
    {
        $query = $this->createQueryBuilder('oeuvre')
                ->select('oeuvre')
                ->where('oeuvre.id = :id')
                ->setParameters([
                    'id' => $id
                ])
                ->getQuery()
        ;
        return $query;
    }

    public function getByCategories(int $id):Query
    {
        $query = $this->createQueryBuilder('oeuvre')
                ->select('oeuvre, categories')
                ->where('categories.id = :id')
                ->join('oeuvre.categories', 'categories')
                ->setParameters([
                    'id' => $id
                ])
                ->getQuery()
        ;
        return $query;
    }

    public function getAll():Query
    {
        $query = $this->createQueryBuilder('oeuvre')
                ->select('oeuvre, categories')
                ->join('oeuvre.categories', 'categories')
                ->getQuery()
        ;
        return $query;
    }

    // /**
    //  * @return Oeuvres[] Returns an array of Oeuvres objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Oeuvres
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
