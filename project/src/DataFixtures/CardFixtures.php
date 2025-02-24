<?php

namespace App\DataFixtures;

use App\Entity\Card;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CardFixtures extends Fixture
{
    public const VALUES = [
        'AS'    => 1,
        '2'     => 2,
        '3'     => 3,
        '4'     => 4,
        '5'     => 5,
        '6'     => 6,
        '7'     => 7,
        '8'     => 8,
        '9'     => 9,
        '10'    => 10,
        'Valet' => 11,
        'Dame'  => 12,
        'Roi'   => 13
    ];

    public const COLORS = [
        'Carreaux'  => 1,
        'Coeur'      => 2,
        'Pique'     => 3,
        'Trefle'    => 4
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::COLORS as $color => $colorOrder) {
            foreach (self::VALUES as $value => $valueOrder) {
                $card = new Card();
                $card->setColor($color)
                    ->setColorOrder($colorOrder)
                    ->setValue($value)
                    ->setValueOrder($valueOrder);
                $manager->persist($card);
            }
        }
        $manager->flush();
    }
}
