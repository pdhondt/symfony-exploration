<?php

namespace App\Entity;

use App\Repository\VillainRepository;
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
}
