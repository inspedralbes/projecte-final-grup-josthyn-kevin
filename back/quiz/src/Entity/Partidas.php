<?php

namespace App\Entity;

use App\Repository\PartidasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartidasRepository::class)]
class Partidas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $puntuacion;

    #[ORM\ManyToOne(targetEntity: quiz::class, inversedBy: 'partidas')]
    #[ORM\JoinColumn(nullable: false)]
    private $quiz;

    #[ORM\Column(type: 'string', length: 255)]
    private $nombre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPuntuacion(): ?int
    {
        return $this->puntuacion;
    }

    public function setPuntuacion(int $puntuacion): self
    {
        $this->puntuacion = $puntuacion;

        return $this;
    }

    public function getQuiz(): ?quiz
    {
        return $this->quiz;
    }

    public function setQuiz(?quiz $quiz): self
    {
        $this->quiz = $quiz;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }
}
