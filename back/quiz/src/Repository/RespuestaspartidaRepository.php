<?php

namespace App\Repository;

use App\Entity\Respuestaspartida;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Respuestaspartida>
 *
 * @method Respuestaspartida|null find($id, $lockMode = null, $lockVersion = null)
 * @method Respuestaspartida|null findOneBy(array $criteria, array $orderBy = null)
 * @method Respuestaspartida[]    findAll()
 * @method Respuestaspartida[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RespuestaspartidaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Respuestaspartida::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Respuestaspartida $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Respuestaspartida $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }




    // /**
    //  * @return Respuestaspartida[] Returns an array of Respuestaspartida objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Respuestaspartida
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
