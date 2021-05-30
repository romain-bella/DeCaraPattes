<?php

namespace App\Entity;

use App\Repository\CroquetteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CroquetteRepository::class)
 */
class Croquette
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
     * @ORM\Column(type="string", length=255)
     */
    private $goutCroquette;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tailleCroquette;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeCroquette;

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

    public function getGoutCroquette(): ?string
    {
        return $this->goutCroquette;
    }

    public function setGoutCroquette(string $goutCroquette): self
    {
        $this->goutCroquette = $goutCroquette;

        return $this;
    }

    public function getTailleCroquette(): ?string
    {
        return $this->tailleCroquette;
    }

    public function setTailleCroquette(string $tailleCroquette): self
    {
        $this->tailleCroquette = $tailleCroquette;

        return $this;
    }

    public function getTypeCroquette(): ?string
    {
        return $this->typeCroquette;
    }

    public function setTypeCroquette(string $typeCroquette): self
    {
        $this->typeCroquette = $typeCroquette;

        return $this;
    }
}
