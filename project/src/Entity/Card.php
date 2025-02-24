<?php

namespace App\Entity;

use App\Repository\CardRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CardRepository::class)]
class Card
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 25, nullable: true)]
    private ?string $color = null;

    #[ORM\Column(nullable: true)]
    private ?int $colorOrder = null;

    #[ORM\Column(length: 25, nullable: true)]
    private ?string $value = null;

    #[ORM\Column(nullable: true)]
    private ?int $valueOrder = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getColorOrder(): ?int
    {
        return $this->colorOrder;
    }

    public function setColorOrder(?int $colorOrder): static
    {
        $this->colorOrder = $colorOrder;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function getValueOrder(): ?int
    {
        return $this->valueOrder;
    }

    public function setValueOrder(?int $valueOrder): static
    {
        $this->valueOrder = $valueOrder;

        return $this;
    }
}
