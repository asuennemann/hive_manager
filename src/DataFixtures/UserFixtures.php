<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();
        $user->setEmail('suennemann@gmail.com')
            ->setFirstName('André')
            ->setLastName('Peuker')
            ->setBirthday(new \DateTime('1990-04-03'))
            ->setRoles(['ROLE_USER']);

        $password = $this->hasher->hashPassword($user, '1234');
        $user->setPassword($password);
        $manager->persist($user);
        $manager->flush();
    }
}
