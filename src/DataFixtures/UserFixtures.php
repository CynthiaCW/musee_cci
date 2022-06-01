<?php

namespace App\DataFixtures;

use App\Entity\Interfaces\IRole;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
//use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements IRole
{
    private $userPasswordHasher;

    public function __construct( UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail("admin@admin.fr");
        $user->setNom("Mani");
        $user->setPrenom("Mamouth");
        //$user->se("lastname");
        $user->addRole(self::ROLE_ADMIN);
        //$password = $this->encoder->encodePassword($user, 'password');
        $user->setPassword($this->userPasswordHasher->hashPassword(
            $user,
            "coucou"
            )
        );
        $manager->persist($user);

        $user = new User(); // ou flush
        $user->setEmail("user@user.fr");
        $user->setNom("Polochon");
        $user->setPrenom("Exotique");
        //$password = $this->encoder->encodePassword($user, 'password');
        $user->setPassword($this->userPasswordHasher->hashPassword(
            $user,
            "coucou"
        )
        );
        $manager->persist($user);
        $manager->flush();
    }
}