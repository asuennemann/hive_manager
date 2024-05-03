<?php

namespace App\Entity;

use App\Repository\BeeColonyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BeeColonyRepository::class)]
class BeeColony
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'beeColonies')]
    private ?Location $locaton = null;

    /**
     * @var Collection<int, BeeColonyCheck>
     */
    #[ORM\OneToMany(targetEntity: BeeColonyCheck::class, mappedBy: 'BeeColony')]
    private Collection $beeColonyChecks;

    public function __construct()
    {
        $this->beeColonyChecks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLocaton(): ?Location
    {
        return $this->locaton;
    }

    public function setLocaton(?Location $locaton): static
    {
        $this->locaton = $locaton;

        return $this;
    }

    /**
     * @return Collection<int, BeeColonyCheck>
     */
    public function getBeeColonyChecks(): Collection
    {
        return $this->beeColonyChecks;
    }

    public function addBeeColonyCheck(BeeColonyCheck $beeColonyCheck): static
    {
        if (!$this->beeColonyChecks->contains($beeColonyCheck)) {
            $this->beeColonyChecks->add($beeColonyCheck);
            $beeColonyCheck->setBeeColony($this);
        }

        return $this;
    }

    public function removeBeeColonyCheck(BeeColonyCheck $beeColonyCheck): static
    {
        if ($this->beeColonyChecks->removeElement($beeColonyCheck)) {
            // set the owning side to null (unless already changed)
            if ($beeColonyCheck->getBeeColony() === $this) {
                $beeColonyCheck->setBeeColony(null);
            }
        }

        return $this;
    }
}
