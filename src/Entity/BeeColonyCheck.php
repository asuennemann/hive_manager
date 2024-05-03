<?php

namespace App\Entity;

use App\Repository\BeeColonyCheckRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BeeColonyCheckRepository::class)]
class BeeColonyCheck
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $broodCombs = null;

    #[ORM\Column]
    private ?bool $queenBeeSeen = null;

    #[ORM\Column(length: 255)]
    private ?string $review = null;

    #[ORM\ManyToOne(inversedBy: 'beeColonyChecks')]
    private ?BeeColony $BeeColony = null;

    /**
     * @var Collection<int, ToDo>
     */
    #[ORM\ManyToMany(targetEntity: ToDo::class, mappedBy: 'beeColonyCheck')]
    private Collection $toDos;

    public function __construct()
    {
        $this->toDos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getBroodCombs(): ?int
    {
        return $this->broodCombs;
    }

    public function setBroodCombs(int $broodCombs): static
    {
        $this->broodCombs = $broodCombs;

        return $this;
    }

    public function isQueenBeeSeen(): ?bool
    {
        return $this->queenBeeSeen;
    }

    public function setQueenBeeSeen(bool $queenBeeSeen): static
    {
        $this->queenBeeSeen = $queenBeeSeen;

        return $this;
    }

    public function getReview(): ?string
    {
        return $this->review;
    }

    public function setReview(string $review): static
    {
        $this->review = $review;

        return $this;
    }

    public function getBeeColony(): ?BeeColony
    {
        return $this->BeeColony;
    }

    public function setBeeColony(?BeeColony $BeeColony): static
    {
        $this->BeeColony = $BeeColony;

        return $this;
    }

    /**
     * @return Collection<int, ToDo>
     */
    public function getToDos(): Collection
    {
        return $this->toDos;
    }

    public function addToDo(ToDo $toDo): static
    {
        if (!$this->toDos->contains($toDo)) {
            $this->toDos->add($toDo);
            $toDo->addBeeColonyCheck($this);
        }

        return $this;
    }

    public function removeToDo(ToDo $toDo): static
    {
        if ($this->toDos->removeElement($toDo)) {
            $toDo->removeBeeColonyCheck($this);
        }

        return $this;
    }
}
