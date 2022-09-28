<?php

namespace App\Entity;

use App\Repository\AvatarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AvatarRepository::class)
 */
class Avatar
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $skin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $top;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $haircolor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hatcolor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $accessories;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $accessoriesColor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facialhair;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facialhaircolor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $clothing;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $clothingcolor;

    /**
     * @ORM\OneToMany(targetEntity=Personnage::class, mappedBy="avatar_personnage")
     */
    private $personnages;

    public function __construct()
    {
        $this->personnages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSkin(): ?string
    {
        return $this->skin;
    }

    public function setSkin(?string $skin): self
    {
        $this->skin = $skin;

        return $this;
    }

    public function getTop(): ?string
    {
        return $this->top;
    }

    public function setTop(?string $top): self
    {
        $this->top = $top;

        return $this;
    }

    public function getHaircolor(): ?string
    {
        return $this->haircolor;
    }

    public function setHaircolor(?string $haircolor): self
    {
        $this->haircolor = $haircolor;

        return $this;
    }

    public function getHatcolor(): ?string
    {
        return $this->hatcolor;
    }

    public function setHatcolor(?string $hatcolor): self
    {
        $this->hatcolor = $hatcolor;

        return $this;
    }

    public function getAccessories(): ?string
    {
        return $this->accessories;
    }

    public function setAccessories(?string $accessories): self
    {
        $this->accessories = $accessories;

        return $this;
    }

    public function getAccessoriesColor(): ?string
    {
        return $this->accessoriesColor;
    }

    public function setAccessoriesColor(?string $accessoriesColor): self
    {
        $this->accessoriesColor = $accessoriesColor;

        return $this;
    }

    public function getFacialhair(): ?string
    {
        return $this->facialhair;
    }

    public function setFacialhair(?string $facialhair): self
    {
        $this->facialhair = $facialhair;

        return $this;
    }

    public function getFacialhaircolor(): ?string
    {
        return $this->facialhaircolor;
    }

    public function setFacialhaircolor(?string $facialhaircolor): self
    {
        $this->facialhaircolor = $facialhaircolor;

        return $this;
    }

    public function getClothing(): ?string
    {
        return $this->clothing;
    }

    public function setClothing(?string $clothing): self
    {
        $this->clothing = $clothing;

        return $this;
    }

    public function getClothingcolor(): ?string
    {
        return $this->clothingcolor;
    }

    public function setClothingcolor(?string $clothingcolor): self
    {
        $this->clothingcolor = $clothingcolor;

        return $this;
    }

    /**
     * @return Collection<int, Personnage>
     */
    public function getPersonnages(): Collection
    {
        return $this->personnages;
    }

    public function addPersonnage(Personnage $personnage): self
    {
        if (!$this->personnages->contains($personnage)) {
            $this->personnages[] = $personnage;
            $personnage->setAvatarPersonnage($this);
        }

        return $this;
    }

    public function removePersonnage(Personnage $personnage): self
    {
        if ($this->personnages->removeElement($personnage)) {
            // set the owning side to null (unless already changed)
            if ($personnage->getAvatarPersonnage() === $this) {
                $personnage->setAvatarPersonnage(null);
            }
        }

        return $this;
    }
}
