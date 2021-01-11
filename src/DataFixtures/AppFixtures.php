<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Person;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Faker\Factory::create("fr_FR");
        for($i = 0; $i <= 100; $i++){
            $person = new Person();
            $person->setLastname( $faker->lastName )
                ->setFirstname( $faker->firstName )
                ->setStreetAddress( $faker->streetAddress )
                ->setZipcode( random_int(1000, 9000) . "0" )
                ->setCity( $faker->city )
                ->setPhone($faker->phoneNumber)
                ->setCountry('France');
            $manager->persist($person);
        }
        $manager->flush();
    }
}
