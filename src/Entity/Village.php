<?php

namespace App\Entity;

use App\Repository\VillageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VillageRepository::class)
 */
class Village
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     */
    private $id_user;

    /**
     * @ORM\ManyToOne(targetEntity=Castle::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_castle;

    /**
     * @ORM\ManyToOne(targetEntity=Sawmill::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_sawmill;

    /**
     * @ORM\ManyToOne(targetEntity=Quarry::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_quarry;

    /**
     * @ORM\ManyToOne(targetEntity=Field::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_field;

    /**
     * @ORM\ManyToOne(targetEntity=Barrack::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_barrack;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getIdCastle(): ?Castle
    {
        return $this->id_castle;
    }

    public function setIdCastle(?Castle $id_castle): self
    {
        $this->id_castle = $id_castle;

        return $this;
    }

    public function getIdSawmill(): ?Sawmill
    {
        return $this->id_sawmill;
    }

    public function setIdSawmill(?Sawmill $id_sawmill): self
    {
        $this->id_sawmill = $id_sawmill;

        return $this;
    }

    public function getIdQuarry(): ?Quarry
    {
        return $this->id_quarry;
    }

    public function setIdQuarry(?Quarry $id_quarry): self
    {
        $this->id_quarry = $id_quarry;

        return $this;
    }

    public function getIdField(): ?Field
    {
        return $this->id_field;
    }

    public function setIdField(?Field $id_field): self
    {
        $this->id_field = $id_field;

        return $this;
    }

    public function getIdBarrack(): ?Barrack
    {
        return $this->id_barrack;
    }

    public function setIdBarrack(?Barrack $id_barrack): self
    {
        $this->id_barrack = $id_barrack;

        return $this;
    }
}
