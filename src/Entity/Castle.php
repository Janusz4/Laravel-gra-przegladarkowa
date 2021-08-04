<?php

namespace App\Entity;

use App\Repository\CastleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CastleRepository::class)
 */
class Castle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Column(type="integer")
     */
    private $wood;

    /**
     * @ORM\Column(type="integer")
     */
    private $stone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getWood(): ?int
    {
        return $this->wood;
    }

    public function setWood(int $wood): self
    {
        $this->wood = $wood;

        return $this;
    }

    public function getStone(): ?int
    {
        return $this->stone;
    }

    public function setStone(int $stone): self
    {
        $this->stone = $stone;

        return $this;
    }
}
