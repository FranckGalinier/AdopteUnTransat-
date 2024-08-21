<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
  private $passwordEncoder;

  public function __construct(UserPasswordHasherInterface $passwordEncoder)
  {
      $this->passwordEncoder = $passwordEncoder;
  }

  public function load(ObjectManager $manager)
  {
      // create 20 products! Bam!
    
          $user = new User();
          $user->setEmail('admin@example.com');
          $user->setRoles(['ROLE_ADMIN']);

          $hashedPassword = $this->passwordEncoder->hashPassword($user, 'admin');
          $user->setPassword($hashedPassword);
          $manager->persist($user);
          $manager->flush();
  }