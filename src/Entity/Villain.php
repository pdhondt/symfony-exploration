<?php

namespace App\Entity;

use App\Repository\VillainRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VillainRepository::class)
 */
class Villain
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
     * @ORM\Column(type="text")
     */
    private $costume;

    /**
     * @ORM\Column(type="integer")
     */
    private $badness;

    /**
     * @ORM\ManyToMany(targetEntity=Move::class, inversedBy="villains", cascade={"persist"})
     */
    private $moves;

    public function __construct()
    {
        $this->moves = new ArrayCollection();
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

    public function getCostume(): ?string
    {
        return $this->costume;
    }

    public function setCostume(string $costume): self
    {
        $this->costume = $costume;

        return $this;
    }

    public function getBadness(): ?int
    {
        return $this->badness;
    }

    public function setBadness(int $badness): self
    {
        $this->badness = $badness;

        return $this;
    }

    public function upBadness()
    {
        $this->badness++;
    }

    /**
     * @return Collection|Move[]
     */
    public function getMoves(): Collection
    {
        return $this->moves;
    }

    public function addMove(Move $move): self
    {
        if (!$this->moves->contains($move)) {
            $this->moves[] = $move;
        }

        return $this;
    }

    public function removeMove(Move $move): self
    {
        $this->moves->removeElement($move);

        return $this;
    }

}
