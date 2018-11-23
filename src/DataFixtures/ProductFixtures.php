<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Product;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	// utilisation de faker
        $faker = \Faker\Factory::create('fr_FR');

        for($i = 1; $i <= 12; $i++) {
        	$product = new Product();
        	$product->setName($faker->word())
        			->setDescription($faker->paragraph($nbSentences = 5))
        			->setPrice($faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 500));

        	$manager->persist($product);
        }

        $manager->flush();
    }
}
