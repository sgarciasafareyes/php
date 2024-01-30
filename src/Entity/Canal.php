<?php

namespace App\Entity;

use App\Repository\CanalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CanalRepository::class)]
#[ORM\Table(name: "canal", schema: "safatuber24")]
class Canal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 400)]
    private ?string $descripcion = null;

    #[ORM\Column(length: 30)]
    private ?string $nombre = null;

    #[ORM\Column(length: 30)]
    private ?string $apellidos = null;

//    #[ORM\Column(length: 200)]
//    private ?string $email = null;
//    #[ORM\Column(length: 255, unique: true)]
//    private ?string $email = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha_nacimiento = null;

    #[ORM\Column(length: 12)]
    private ?string $telefono = null;

    #[ORM\Column(length: 5000)]
    private ?string $foto = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false, name: 'id_usuario')]
    private ?Usuario $usuario = null;



    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false, name: "id_tipo_contenido")]
    private ?TipoContenido $tipoContenido = null;

    #[ORM\Column(length: 5000)]
    private ?string $banner = null;


    public function __construct()
    {
        $this->notificacions = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): static
    {
        $this->apellidos = $apellidos;

        return $this;
    }


    public function getFechaNacimiento(): ?string
    {
        return $this->fecha_nacimiento->format('d/m/Y');
    }

    public function setFechaNacimiento(string $fecha_nacimiento): static
    {
        $this->fecha_nacimiento = \DateTime::createFromFormat('d/m/Y',$fecha_nacimiento);

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): static
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(string $foto): static
    {
        $this->foto = $foto;

        return $this;
    }


    public function getUsuario(): ?usuario
    {
        return $this->usuario;
    }

    public function setUsuario(usuario $usuario): static
    {
        $this->usuario = $usuario;

        return $this;
    }



    public function getTipoContenido(): ?TipoContenido
    {
        return $this->tipoContenido;
    }

    public function setTipoContenido(?TipoContenido $tipoContenido): static
    {
        $this->tipoContenido = $tipoContenido;

        return $this;
    }

    public function getBanner(): ?string
    {
        return $this->banner;
    }

    public function setBanner(string $banner): static
    {
        $this->banner = $banner;

        return $this;
    }


}
