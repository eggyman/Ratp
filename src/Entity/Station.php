<?php

// src/Entity/Station.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: "App\Repository\StationRepository")]
class Station
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "string", length: 255)]
    private $nomGares;

    #[ORM\Column(type: "string", length: 255)]
    private $lineLogo;

    #[ORM\Column(type: "boolean")]
    private $isTerminus;

    #[ORM\Column(type: "json", nullable: true)]
    private $connections = [];

    // Getters and Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomGares(): ?string
    {
        return $this->nomGares;
    }

    public function setNomGares(string $nomGares): self
    {
        $this->nomGares = $nomGares;

        return $this;
    }

    public function getLineLogo(): ?string
    {
        return $this->lineLogo;
    }

    public function setLineLogo(string $lineLogo): self
    {
        $this->lineLogo = $lineLogo;

        return $this;
    }

    public function getIsTerminus(): ?bool
    {
        return $this->isTerminus;
    }

    public function setIsTerminus(bool $isTerminus): self
    {
        $this->isTerminus = $isTerminus;

        return $this;
    }

    public function getConnections(): ?array
    {
        return $this->connections;
    }

    public function setConnections(?array $connections): self
    {
        $this->connections = $connections;

        return $this;
    }
}
