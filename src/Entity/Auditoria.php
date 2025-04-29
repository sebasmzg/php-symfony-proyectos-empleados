<?php

namespace App\Entity;

use App\Repository\AuditoriaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuditoriaRepository::class)]
class Auditoria
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $usuario = null;

    #[ORM\Column(length: 255)]
    private ?string $entidad = null;

    #[ORM\Column(length: 255)]
    private ?string $tipoAccion = null;

    #[ORM\Column]
    private ?\DateTime $fechaHora = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): ?string
    {
        return $this->usuario;
    }

    public function setUsuario(string $usuario): static
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getEntidad(): ?string
    {
        return $this->entidad;
    }

    public function setEntidad(string $entidad): static
    {
        $this->entidad = $entidad;

        return $this;
    }

    public function getTipoAccion(): ?string
    {
        return $this->tipoAccion;
    }

    public function setTipoAccion(string $tipoAccion): static
    {
        $this->tipoAccion = $tipoAccion;

        return $this;
    }

    public function getFechaHora(): ?\DateTime
    {
        return $this->fechaHora;
    }

    public function setFechaHora(\DateTime $fechaHora): static
    {
        $this->fechaHora = $fechaHora;

        return $this;
    }
}
