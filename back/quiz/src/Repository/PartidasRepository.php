<?php

namespace App\Repository;

use App\Entity\Partidas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Partidas>
 *
 * @method Partidas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Partidas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Partidas[]    findAll()
 * @method Partidas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartidasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Partidas::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Partidas $entity, bool $flush = true): void
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
    public function remove(Partidas $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function encontrarMejoresJugadores($id): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT partidas.nombre, partidas.puntuacion FROM partidas WHERE partidas.quiz_id=$id ORDER BY partidas.puntuacion DESC LIMIT 10;";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        return $resultSet->fetchAllAssociative();
    }
    public function ultimaPartida($idUsuario): int
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT partidas.id FROM partidas WHERE partidas.usuario=$idUsuario ORDER BY partidas.id DESC LIMIT 1;";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        return $resultSet->fetchOne();
    }

    public function partidasJugadas($id): int
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT COUNT(partidas.id) FROM partidas WHERE partidas.quiz_id=$id;";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        return $resultSet->fetchOne();
    }

    public function partidasIdQuiz(): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT DISTINCT partidas.quiz_id FROM partidas;";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        return $resultSet->fetchAllAssociative();
    }

    public function numPartidas($id): int
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT COUNT(partidas.id) AS partidasJugadas FROM partidas WHERE partidas.quiz_id=$id;";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        return $resultSet->fetchOne();
    }

    // /**
    //  * @return Partidas[] Returns an array of Partidas objects
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
    public function findOneBySomeField($value): ?Partidas
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
