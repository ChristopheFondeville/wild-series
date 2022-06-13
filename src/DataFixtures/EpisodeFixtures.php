<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public const N_EPISODES = 10;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for($i = 0; $i < ProgramFixtures::N_PROGRAMS; $i++) {
            for ($j = 0; $j < SeasonFixtures::N_SEASONS; $j++) {
                for ($k = 0; $k < self::N_EPISODES; $k++) {
                    $episode = new Episode();
                    $episode->setTitle($faker->company);
                    $episode->setNumber($k+1);
                    $episode->setSynopsis($faker->realText());
                    $episode->setSeason($this->getReference('season-' . $i . '-' . $j));
                    $manager->persist($episode);
                }
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            SeasonFixtures::class
        ];
    }
}