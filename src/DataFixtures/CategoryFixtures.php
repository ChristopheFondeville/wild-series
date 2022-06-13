<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const N_CATEGORY = 5;

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < self::N_CATEGORY; $i++) {
            $category = new Category();
            $category->setName('category-' . $i);
            $manager->persist($category);

            $this->addReference('category-' . $i, $category);
        }

        $manager->flush();
    }
}