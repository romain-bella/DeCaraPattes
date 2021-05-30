<?php

namespace App\Entity;

use App\Repository\RehabilitationAgressifRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RehabilitationAgressifRepository::class)
 */
class RehabilitationAgressif
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
