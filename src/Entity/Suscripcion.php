<?php

namespace App\Entity;

use App\Repository\SuscripcionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuscripcionRepository::class)]
#[ORM\Table(name: "suscripcion", schema: "safatuber24")]
class Suscripcion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false, name: "id_usuario_suscriptor")]
    private ?Usuario $usuario_suscriptor = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false, name: "id_canal_suscrito")]
    private ?Canal $canal_suscrito = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUsuarioSuscriptor(): ?Usuario
    {
        return $this->usuario_suscriptor;
    }

    public function setIdUsuarioSuscriptor(?Usuario $usuario_suscriptor): static
    {
        $this->usuario_suscriptor = $usuario_suscriptor;

        return $this;
    }

    public function getIdCanalSuscrito(): ?Canal
    {
        return $this->canal_suscrito;
    }

    public function setIdCanalSuscrito(?Canal $canal_suscrito): static
    {
        $this->canal_suscrito = $canal_suscrito;

        return $this;
    }
}
