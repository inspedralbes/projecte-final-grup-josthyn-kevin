<?php

namespace App\Repository;

use App\Entity\Quiz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use PhpParser\Node\Expr\Array_;

/**
 * @extends ServiceEntityRepository<Quiz>
 *
 * @method Quiz|null find($id, $lockMode = null, $lockVersion = null)
 * @method Quiz|null findOneBy(array $criteria, array $orderBy = null)
 * @method Quiz[]    findAll()
 * @method Quiz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuizRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Quiz::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Quiz $entity, bool $flush = true): void
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
    public function remove(Quiz $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
    public function update(Quiz $entity, bool $flush = true): void
    {
        $this->_em->flush();
    }

    public function ultimoQuiz($idUsuario): int
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT quiz.id FROM quiz WHERE quiz.usuario_id=$idUsuario ORDER BY quiz.id DESC LIMIT 1;";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        return $resultSet->fetchOne();
    }

    public function quizUsuario($id): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT quiz.titulo, quiz.id FROM quiz WHERE quiz.usuario_id = $id;";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        return $resultSet->fetchAllAssociative();
    }

    public function quizPuntuacion($idQuiz,$idUsuario): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT quiz.titulo, partidas.puntuacion FROM partidas JOIN quiz ON partidas.quiz_id=quiz.id JOIN usuario ON partidas.usuario=usuario.id WHERE partidas.quiz_id=$idQuiz AND partidas.usuario=$idUsuario ORDER BY partidas.puntuacion DESC LIMIT 1;";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        return $resultSet->fetchAllAssociative();
    }

    public function quizJugados($idUsuario): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT DISTINCT partidas.quiz_id FROM partidas WHERE partidas.usuario=$idUsuario;";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        return $resultSet->fetchAllAssociative();
    }

    // /**
    //  * @return Quiz[] Returns an array of Quiz objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Quiz
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
