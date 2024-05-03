<?php

namespace App\Entity;

use App\Repository\ToDoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ToDoRepository::class)]
class ToDo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $toDo = null;

    #[ORM\Column(nullable: true)]
    private ?bool $done = null;

    /**
     * @var Collection<int, BeeColonyCheck>
     */
    #[ORM\ManyToMany(targetEntity: BeeColonyCheck::class, inversedBy: 'toDos')]
    private Collection $beeColonyCheck;

    public function __construct()
    {
        $this->beeColonyCheck = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getToDo(): ?string
    {
        return $this->toDo;
    }

    public function setToDo(string $toDo): static
    {
        $this->toDo = $toDo;

        return $this;
    }

    public function isDone(): ?bool
    {
        return $this->done;
    }

    public function setDone(?bool $done): static
    {
        $this->done = $done;

        return $this;
    }

    /**
     * @return Collection<int, BeeColonyCheck>
     */
    public function getBeeColonyCheck(): Collection
    {
        return $this->beeColonyCheck;
    }

    public function addBeeColonyCheck(BeeColonyCheck $beeColonyCheck): static
    {
        if (!$this->beeColonyCheck->contains($beeColonyCheck)) {
            $this->beeColonyCheck->add($beeColonyCheck);
        }

        return $this;
    }

    public function removeBeeColonyCheck(BeeColonyCheck $beeColonyCheck): static
    {
        $this->beeColonyCheck->removeElement($beeColonyCheck);

        return $this;
    }
}
