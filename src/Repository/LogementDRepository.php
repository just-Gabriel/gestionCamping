<?php

namespace App\Repository;

use App\Entity\LogementD;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LogementD>
 *
 * @method LogementD|null find($id, $lockMode = null, $lockVersion = null)
 * @method LogementD|null findOneBy(array $criteria, array $orderBy = null)
 * @method LogementD[]    findAll()
 * @method LogementD[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogementDRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LogementD::class);
    }

//    /**
//     * @return LogementD[] Returns an array of LogementD objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LogementD
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
