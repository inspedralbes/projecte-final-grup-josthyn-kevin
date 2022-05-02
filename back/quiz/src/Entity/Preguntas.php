<?php

namespace App\Entity;

use App\Repository\PreguntasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PreguntasRepository::class)]
class Preguntas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Enunciado;

    #[ORM\Column(type: 'string', length: 255)]
    private $r1;

    #[ORM\Column(type: 'string', length: 255)]
    private $r2;

    #[ORM\Column(type: 'string', length: 255)]
    private $r3;

    #[ORM\Column(type: 'string', length: 255)]
    private $r4;

    #[ORM\Column(type: 'string', length: 255)]
    private $r5;

    #[ORM\ManyToOne(targetEntity: Quiz::class, inversedBy: 'preguntas')]
    #[ORM\JoinColumn(nullable: false)]
    private $idQuiz;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnunciado(): ?string
    {
        return $this->Enunciado;
    }

    public function setEnunciado(string $Enunciado): self
    {
        $this->Enunciado = $Enunciado;

        return $this;
    }

    public function getR1(): ?string
    {
        return $this->r1;
    }

    public function setR1(string $r1): self
    {
        $this->r1 = $r1;

        return $this;
    }

    public function getR2(): ?string
    {
        return $this->r2;
    }

    public function setR2(string $r2): self
    {
        $this->r2 = $r2;

        return $this;
    }

    public function getR3(): ?string
    {
        return $this->r3;
    }

    public function setR3(string $r3): self
    {
        $this->r3 = $r3;

        return $this;
    }

    public function getR4(): ?string
    {
        return $this->r4;
    }

    public function setR4(string $r4): self
    {
        $this->r4 = $r4;

        return $this;
    }

    public function getR5(): ?string
    {
        return $this->r5;
    }

    public function setR5(string $r5): self
    {
        $this->r5 = $r5;

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
