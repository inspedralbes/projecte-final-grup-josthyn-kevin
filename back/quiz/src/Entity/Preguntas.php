<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Preguntas
 *
 * @ORM\Table(name="preguntas", indexes={@ORM\Index(name="IDX_387948555BA17805", columns={"id_quiz_id"})})
 * @ORM\Entity
 */
class Preguntas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="enunciado", type="string", length=255, nullable=false)
     */
    private $enunciado;

    /**
     * @var \Quiz
     *
     * @ORM\ManyToOne(targetEntity="Quiz")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_quiz_id", referencedColumnName="id")
     * })
     */
    private $idQuiz;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnunciado(): ?string
    {
        return $this->enunciado;
    }

    public function setEnunciado(string $enunciado): self
    {
        $this->enunciado = $enunciado;

        return $this;
    }

    public function getIdQuiz(): ?Quiz
    {
        return $this->idQuiz;
    }

    public function setIdQuiz(?Quiz $idQuiz): self
    {
        $this->idQuiz = $idQuiz;

        return $this;
    }


}
