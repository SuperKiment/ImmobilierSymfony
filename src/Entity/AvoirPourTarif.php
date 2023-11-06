<?php

namespace App\Entity;

use App\Repository\AvoirPourTarifRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvoirPourTarifRepository::class)]
class AvoirPourTarif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $prixSemaine = null;

    #[ORM\ManyToOne(inversedBy: 'avoirPourTarifs')]
    private ?Saison $saisons = null;

    #[ORM\ManyToOne(inversedBy: 'avoirPourTarifs')]
    private ?Categorie $categories = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixSemaine(): ?float
    {
        return $this->prixSemaine;
    }

    public function setPrixSemaine(float $prixSemaine): static
    {
        $this->prixSemaine = $prixSemaine;

        return $this;
    }

    public function getSaisons(): ?Saison
    {
        return $this->saisons;
    }

    public function setSaisons(?Saison $saisons): static
    {
        $this->saisons = $saisons;

        return $this;
    }

    public function getCategories(): ?Categorie
    {
        return $this->categories;
    }

    public function setCategories(?Categorie $categories): static
    {
        $this->categories = $categories;

        return $this;
    }
}
