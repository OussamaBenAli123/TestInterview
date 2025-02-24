<?php

namespace App\Model;

use App\Entity\Card;

class CardModel
{
    private int $id;

    private string $color;

    private string $value;

    public function __construct(
        private readonly Card $card
    )
    {
        $this->setId()
            ->setColor()
            ->setValue();
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'color' => $this->getColor(),
            'value' => $this->getValue()
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(): self
    {
        $this->id = $this->card->getId();

        return $this;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(): self
    {
        $this->color = $this->card->getColor();

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(): self
    {
        $this->value = $this->card->getValue();

        return $this;
    }
}