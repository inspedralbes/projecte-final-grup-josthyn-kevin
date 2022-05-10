<?php

namespace App\Repository;

use App\Entity\Respuestas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Respuestas>
 *
 * @method Respuestas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Respuestas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Respuestas[]    findAll()
 * @method Respuestas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RespuestasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Respuestas::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Respuestas $entity, bool $flush = true): void
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
    public function remove(Respuestas $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function respuestas($id, $idPregunta): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT respuestas.id, respuestas.respuesta, respuestas.estado FROM respuestas JOIN preguntas ON respuestas.pregunta=preguntas.id JOIN quiz ON preguntas.id_quiz_id = quiz.id WHERE preguntas.id_quiz_id = $id AND respuestas.pregunta=$idPregunta;";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        return $resultSet->fetchAllAssociative();
    }

    // /**
    //  * @return Respuestas[] Returns an array of Respuestas objects
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
    public function findOneBySomeField($value): ?Respuestas
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
