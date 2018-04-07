<?php
// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\User As myUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
            $product = new myUser();
            $product->setRankID(1);
            $product->setLoginName("name");
            $product->setLoginPass("pass");
            $product->setName("myName");
            $product->setSurname("mySurname");
            $manager->persist($product);

        $manager->flush();
    }
}