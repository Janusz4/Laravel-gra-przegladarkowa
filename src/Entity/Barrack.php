<?php

namespace App\Entity;

use App\Repository\BarrackRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BarrackRepository::class)
 */
class Barrack
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

    /**
     * @ORM\Column(type="integer")
     */
    private $worriors;

    /**
     * @ORM\Column(type="integer")
     */
    private $archers;

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

    public function getWorriors(): ?int
    {
        return $this->worriors;
    }

    public function setWorriors(int $worriors): self
    {
        $this->worriors = $worriors;

        return $this;
    }

    public function getArchers(): ?int
    {
        return $this->archers;
    }

    public function setArchers(int $archers): self
    {
        $this->archers = $archers;

        return $this;
    }
}
