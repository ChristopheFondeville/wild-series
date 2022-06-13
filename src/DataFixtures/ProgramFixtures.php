<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public const N_PROGRAMS = 10;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < self::N_PROGRAMS; $i++) {
            $program = new Program();
            $program->setTitle($faker->company());
            $program->setSynopsis($faker->realText);
            $program->setPoster('https://resizing.flixster.com/MjVssEgJGXiAeZbseh8zQ7xrSPk=/206x305/v2/https://flxt.tmsimg.com/assets/p185013_b_v8_af.jpg');
            $program->setCategory($this->getReference('category-' . mt_rand(0, CategoryFixtures::N_CATEGORY)));
            $manager->persist($program);

            $this->addReference('program-' . $i, $program);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}