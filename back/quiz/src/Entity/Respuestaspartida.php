<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Respuestaspartida
 *
 * @ORM\Table(name="respuestaspartida", indexes={@ORM\Index(name="idRespuesta", columns={"idRespuesta"}), @ORM\Index(name="idPartida", columns={"idPartida"}), @ORM\Index(name="idPregunta", columns={"idPregunta"})})
 * @ORM\Entity(repositoryClass="App\Repository\RespuestaspartidaRepository")
 */
class Respuestaspartida
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
     * @var \Partidas
     *
     * @ORM\ManyToOne(targetEntity="Partidas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPartida", referencedColumnName="id")
     * })
     */
    private $idpartida;

    /**
     * @var \Respuestas
     *
     * @ORM\ManyToOne(targetEntity="Respuestas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRespuesta", referencedColumnName="id")
     * })
     */
    private $idrespuesta;

    /**
     * @var \Preguntas
     *
     * @ORM\ManyToOne(targetEntity="Preguntas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPregunta", referencedColumnName="id")
     * })
     */
    private $idpregunta;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdpartida(): ?Partidas
    {
        return $this->idpartida;
    }

    public function setIdpartida(?Partidas $idpartida): self
    {
        $this->idpartida = $idpartida;

        return $this;
    }

    public function getIdrespuesta(): ?Respuestas
    {
        return $this->idrespuesta;
    }

    public function setIdrespuesta(?Respuestas $idrespuesta): self
    {
        $this->idrespuesta = $idrespuesta;

        return $this;
    }

    public function getIdpregunta(): ?Preguntas
    {
        return $this->idpregunta;
    }

    public function setIdpregunta(?Preguntas $idpregunta): self
    {
        $this->idpregunta = $idpregunta;

        return $this;
    }


}
