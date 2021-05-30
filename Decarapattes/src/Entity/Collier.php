<?php

namespace App\Entity;

use App\Repository\CollierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CollierRepository::class)
 */
class Collier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="float")
     */
    private $tailleCollier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleurCollier;

    /**
     * @ORM\ManyToOne(targetEntity=OptionCollier::class)
     */
    private $uneoption;

    /**
     * @ORM\ManyToOne(targetEntity=TypeBouclerieCollier::class)
     */
    private $unebouclerie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getTailleCollier(): ?float
    {
        return $this->tailleCollier;
    }

    public function setTailleCollier(float $tailleCollier): self
    {
        $this->tailleCollier = $tailleCollier;

        return $this;
    }

    public function getCouleurCollier(): ?string
    {
        return $this->couleurCollier;
    }

    public function setCouleurCollier(?string $couleurCollier): self
    {
        $this->couleurCollier = $couleurCollier;

        return $this;
    }

    public function getUneoption(): ?OptionCollier
    {
        return $this->uneoption;
    }

    public function setUneoption(?OptionCollier $uneoption): self
    {
        $this->uneoption = $uneoption;

        return $this;
    }

    public function getUnebouclerie(): ?TypeBouclerieCollier
    {
        return $this->unebouclerie;
    }

    public function setUnebouclerie(?TypeBouclerieCollier $unebouclerie): self
    {
        $this->unebouclerie = $unebouclerie;

        return $this;
    }
}
