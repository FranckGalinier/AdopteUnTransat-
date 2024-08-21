<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Document\Transat;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\MongoDBBundle\Fixture\Fixture as MongoFixture;



class AppFixtures extends MongoFixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $transat = new Transat();
        $transat->setType('Simple')
        ->setEmplacement('A1');
        $manager->persist($transat);
        $manager->flush();

        $transat = new Transat();
        $transat->setType('Double')
        ->setEmplacement('A2');
        $manager->persist($transat);
        $manager->flush();

        $transat = new Transat();
        $transat->setType('Simple')
        ->setEmplacement('A3');
        $manager->persist($transat);
        $manager->flush();

        $transat = new Transat();
        $transat->setType('Double')
        ->setEmplacement('A4');
        $manager->persist($transat);
        $manager->flush();

        $transat = new Transat();
        $transat->setType('Simple')
        ->setEmplacement('B1');
        $manager->persist($transat);
        $manager->flush();

        $transat = new Transat();
        $transat->setType('Double')
        ->setEmplacement('B2');
        $manager->persist($transat);
        $manager->flush();

        $transat = new Transat();
        $transat->setType('Simple')
        ->setEmplacement('B3');
        $manager->persist($transat);
        $manager->flush();  

        $transat = new Transat();
        $transat->setType('Double')
        ->setEmplacement('B4');
        $manager->persist($transat);
        $manager->flush();

        $transat = new Transat();
        $transat->setType('Simple')
        ->setEmplacement('C1');
        $manager->persist($transat);
        $manager->flush();

        $transat = new Transat();
        $transat->setType('Double')
        ->setEmplacement('C2');
        $manager->persist($transat);
        $manager->flush();

        $transat = new Transat();
        $transat->setType('Simple')
        ->setEmplacement('C3');
        $manager->persist($transat);
        $manager->flush();

        $transat = new Transat();
        $transat->setType('Double')
        ->setEmplacement('C4');
        $manager->persist($transat);
        $manager->flush();

        $transat = new Transat();
        $transat->setType('Simple')
        ->setEmplacement('D1');
        $manager->persist($transat);
        $manager->flush();

        $transat = new Transat();
        $transat->setType('Double')
        ->setEmplacement('D2');
        $manager->persist($transat);
        $manager->flush();

        $transat = new Transat();
        $transat->setType('Simple')
        ->setEmplacement('D3');
        $manager->persist($transat);
        $manager->flush();

        $transat = new Transat();
        $transat->setType('Double')
        ->setEmplacement('D4');
        $manager->persist($transat);
        $manager->flush();
    
        $user = new User();
        $user->setEmail('franck.galinier');
        $user->setPassword('password');
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);
        $manager->flush();

    }
}
