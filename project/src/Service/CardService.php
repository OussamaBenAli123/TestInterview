<?php

namespace App\Service;

use App\Model\CardModel;
use App\Repository\CardRepository;

class CardService
{
    public function __construct(
        private readonly CardRepository $cardRepository
    )
    {
    }

    public function getCards(): array
    {
        $cards = $this->cardRepository->getCards();
        $result = [];
        foreach ($cards as $card) {
            $result[] = (new CardModel($card))->toArray();
        }

        return $result;
    }

    public function sortCards(
        array $cards
    )
    {
        $ids = array_column($cards, 'id');
        $cards = $this->cardRepository->sortCards($ids);
        $result = [];
        foreach ($cards as $card) {
            $result[] = (new CardModel($card))->toArray();
        }

        return $result;
    }
}