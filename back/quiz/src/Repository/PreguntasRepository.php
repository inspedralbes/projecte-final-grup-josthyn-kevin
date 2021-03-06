<?php

namespace App\Repository;

use App\Entity\Preguntas;
use App\Entity\Quiz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Preguntas>
 *
 * @method Preguntas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Preguntas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Preguntas[]    findAll()
 * @method Preguntas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PreguntasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Preguntas::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Preguntas $entity, bool $flush = true): void
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
    public function remove(Preguntas $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function update(Preguntas $entity, bool $flush = true): void
    {
        $this->_em->flush();
    }

    public function ultimaPregunta($quiz_id): int
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT preguntas.id FROM preguntas WHERE preguntas.id_quiz_id=$quiz_id ORDER BY preguntas.id DESC LIMIT 1;";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        return $resultSet->fetchOne();
    }

    // /**
    //  * @return Preguntas[] Returns an array of Preguntas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Preguntas
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
