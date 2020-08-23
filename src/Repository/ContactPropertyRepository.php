<?php

namespace App\Repository;

use App\Entity\ContactProperty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContactProperty|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactProperty|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactProperty[]    findAll()
 * @method ContactProperty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactPropertyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContactProperty::class);
    }

    // /**
    //  * @return ContactProperty[] Returns an array of ContactProperty objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContactProperty
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
