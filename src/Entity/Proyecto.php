<?php

namespace App\Entity;

use App\Repository\ProyectoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProyectoRepository::class)]
class Proyecto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombreProyecto = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $fechaInicio = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $fechaFin = null;

    /**
     * @var Collection<int, Empleado>
     */
    #[ORM\ManyToMany(targetEntity: Empleado::class, inversedBy: 'proyectos')]
    private Collection $empleados;

    public function __construct()
    {
        $this->empleados = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreProyecto(): ?string
    {
        return $this->nombreProyecto;
    }

    public function setNombreProyecto(string $nombreProyecto): static
    {
        $this->nombreProyecto = $nombreProyecto;

        return $this;
    }

    public function getFechaInicio(): ?\DateTime
    {
        return $this->fechaInicio;
    }

    public function setFechaInicio(\DateTime $fechaInicio): static
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    public function getFechaFin(): ?\DateTime
    {
        return $this->fechaFin;
    }

    public function setFechaFin(\DateTime $fechaFin): static
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * @return Collection<int, Empleado>
     */
    public function getEmpleados(): Collection
    {
        return $this->empleados;
    }

    public function addEmpleado(Empleado $empleado): static
    {
        if (!$this->empleados->contains($empleado)) {
            $this->empleados->add($empleado);
        }

        return $this;
    }

    public function removeEmpleado(Empleado $empleado): static
    {
        $this->empleados->removeElement($empleado);

        return $this;
    }
}
