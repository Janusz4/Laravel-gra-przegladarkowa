<?php

namespace App\Entity;

use App\Repository\ArmyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArmyRepository::class)
 */
class Army
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
    private $worriors;

    /**
     * @ORM\Column(type="integer")
     */
    private $archers;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="id_army", cascade={"persist", "remove"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setIdArmy(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getIdArmy() !== $this) {
            $user->setIdArmy($this);
        }

        $this->user = $user;

        return $this;
    }
}
