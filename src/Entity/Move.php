<?php

namespace App\Entity;

use App\Repository\MoveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MoveRepository::class)
 */
class Move
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
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Villain::class, mappedBy="moves")
     */
    private $villains;

    public function __construct()
    {
        $this->villains = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Villain[]
     */
    public function getVillains(): Collection
    {
        return $this->villains;
    }

    public function addVillain(Villain $villain): self
    {
        if (!$this->villains->contains($villain)) {
            $this->villains[] = $villain;
            $villain->addMove($this);
        }

        return $this;
    }

    public function removeVillain(Villain $villain): self
    {
        if ($this->villains->removeElement($villain)) {
            $villain->removeMove($this);
        }

        return $this;
    }
}
