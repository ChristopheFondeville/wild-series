<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $program = new Program();
        $program->setTitle('Walking dead');
        $program->setSynopsis('Des zombies envahissent la terre');
        $program->setCategory($this->getReference('category_Action'));
        $manager->persist($program);
        $manager->flush();

        $program = new Program();
        $program->setTitle('Coup de foudre à Notting hill');
        $program->setSynopsis("William Thacker est propriétaire d'une librairie indépendante dans le quartier de Notting Hill, à Londres. Il partage un appartement avec Spike, un Gallois excentrique, et a un petit groupe d'amis proches.");
        $program->setCategory($this->getReference('category_Romantique'));
        $manager->persist($program);
        $manager->flush();

        $program = new Program();
        $program->setTitle('14 X 8000');
        $program->setSynopsis("L'intrépide alpiniste népalais Nims Purja tente de réaliser l'impossible : gravir en sept mois les 14 sommets du monde culminant à plus de 8 000 mètres d'altitude.");
        $program->setCategory($this->getReference('category_Documentaire'));
        $manager->persist($program);
        $manager->flush();

        $program = new Program();
        $program->setTitle('Seven');
        $program->setSynopsis("Pour conclure sa carrière, l'inspecteur Somerset, vieux flic blasé, tombe à sept jours de la retraite sur un criminel peu ordinaire");
        $program->setCategory($this->getReference('category_Policier'));
        $manager->persist($program);
        $manager->flush();

        $program = new Program();
        $program->setTitle('Avatar');
        $program->setSynopsis("L’action se déroule en 21543 sur Pandora, une des lunes de Polyphème, une planète géante gazeuse en orbite autour d'Alpha Centauri A, le système stellaire le plus proche de la Terre");
        $program->setCategory($this->getReference('category_Science-fiction'));
        $manager->persist($program);
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            CategoryFixtures::class,
        ];
    }
}
