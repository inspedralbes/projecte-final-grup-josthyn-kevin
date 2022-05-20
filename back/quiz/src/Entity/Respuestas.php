<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Respuestas
 *
 * @ORM\Table(name="respuestas", indexes={@ORM\Index(name="pregunta", columns={"pregunta"})})
 * @ORM\Entity
 */
class Respuestas
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
     * @var string|null
     *
     * @ORM\Column(name="respuesta", type="string", length=500, nullable=true)
     */
    private $respuesta;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

    /**
     * @var \Preguntas
     *
     * @ORM\ManyToOne(targetEntity="Preguntas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pregunta", referencedColumnName="id")
     * })
     */
    private $pregunta;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRespuesta(): ?string
    {
        return $this->respuesta;
    }

    public function setRespuesta(?string $respuesta): self
    {
        $this->respuesta = $respuesta;

        return $this;
    }

    public function isEstado(): ?bool
    {
        return $this->estado;
    }

    public function setEstado(?bool $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getPregunta(): ?Preguntas
    {
        return $this->pregunta;
    }

    public function setPregunta(?Preguntas $pregunta): self
    {
        $this->pregunta = $pregunta;

        return $this;
    }


}
