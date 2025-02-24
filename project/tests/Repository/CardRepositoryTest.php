<?php

namespace Repository;

use App\Entity\Card;
use App\Repository\CardRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CardRepositoryTest extends KernelTestCase
{
    public const RESULT_CARDS = [
        [
            'id' => 2,
            'color' => 'Carreaux',
            'value' => '2'
        ],
        [
            'id' => 10,
            'color' => 'Carreaux',
            'value' => '10'
        ],
        [
            'id' => 12,
            'color' => 'Carreaux',
            'value' => 'Dame'
        ],
        [
            'id' => 16,
            'color' => 'Coeur',
            'value' => '3'
        ],
        [
            'id' => 17,
            'color' => 'Coeur',
            'value' => '4'
        ],
        [
            'id' => 18,
            'color' => 'Coeur',
            'value' => '5'
        ],
        [
            'id' => 30,
            'color' => 'Pique',
            'value' => '4'
        ],
        [
            'id' => 34,
            'color' => 'Pique',
            'value' => '8'
        ],
        [
            'id' => 36,
            'color' => 'Pique',
            'value' => '10'
        ],
        [
            'id' => 40,
            'color' => 'Trefle',
            'value' => 'AS'
        ],
    ];

    private ?CardRepository $cardRepository;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->cardRepository = static::getContainer()->get(CardRepository::class);
    }

    public function testGetCards(): void
    {
        $cards = $this->cardRepository->getCards();

        $this->assertCount(10, $cards);
        $this->assertContainsOnlyInstancesOf(Card::class, $cards);
    }

    public function testSortCards(): void
    {
        $ids = [36, 16, 18, 17, 12, 30, 40, 10, 34, 2];
        $cards = $this->cardRepository->sortCards($ids);

        $this->assertEquals(self::RESULT_CARDS, $cards);
    }
}