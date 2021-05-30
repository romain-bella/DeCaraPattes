<?php

namespace App\Entity;

use App\Repository\LaisseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LaisseRepository::class)
 */
class Laisse
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
    private $tailleLaisse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleurLaisse;

    /**
     * @ORM\ManyToOne(targetEntity=OptionLaisse::class)
     */
    private $uneoption;

    /**
     * @ORM\ManyToOne(targetEntity=TypeBouclerieLaisse::class)
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

    public function getTailleLaisse(): ?float
    {
        return $this->tailleLaisse;
    }

    public function setTailleLaisse(float $tailleLaisse): self
    {
        $this->tailleLaisse = $tailleLaisse;

        return $this;
    }

    public function getCouleurLaisse(): ?string
    {
        return $this->couleurLaisse;
    }

    public function setCouleurLaisse(?string $couleurLaisse): self
    {
        $this->couleurLaisse = $couleurLaisse;

        return $this;
    }

    public function getUneoption(): ?OptionLaisse
    {
        return $this->uneoption;
    }

    public function setUneoption(?OptionLaisse $uneoption): self
    {
        $this->uneoption = $uneoption;

        return $this;
    }

    public function getUnebouclerie(): ?TypeBouclerieLaisse
    {
        return $this->unebouclerie;
    }

    public function setUnebouclerie(?TypeBouclerieLaisse $unebouclerie): self
    {
        $this->unebouclerie = $unebouclerie;

        return $this;
    }
}
