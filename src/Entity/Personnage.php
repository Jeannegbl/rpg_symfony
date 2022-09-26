<?php

namespace App\Entity;

use App\Repository\PersonnageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonnageRepository::class)
 */
class Personnage
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
    private $nom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $niveau;

    /**
     * @ORM\Column(type="integer")
     */
    private $experience;

    /**
     * @ORM\Column(type="integer")
     */
    private $barre_vie;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="personnages")
     */
    private $type_personnage;

    /**
     * @ORM\ManyToOne(targetEntity=Competences::class, inversedBy="personnages")
     */
    private $competences_personnage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(?\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

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

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getBarreVie(): ?int
    {
        return $this->barre_vie;
    }

    public function setBarreVie(int $barre_vie): self
    {
        $this->barre_vie = $barre_vie;

        return $this;
    }

    public function getTypePersonnage(): ?Type
    {
        return $this->type_personnage;
    }

    public function setTypePersonnage(?Type $type_personnage): self
    {
        $this->type_personnage = $type_personnage;

        return $this;
    }

    public function getCompetencesPersonnage(): ?Competences
    {
        return $this->competences_personnage;
    }

    public function setCompetencesPersonnage(?Competences $competences_personnage): self
    {
        $this->competences_personnage = $competences_personnage;

        return $this;
    }
}
