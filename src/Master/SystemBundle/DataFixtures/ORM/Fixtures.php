<?php

namespace Master\SystemBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Master\SystemBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Fixtures implements FixtureInterface, ContainerAwareInterface
{
    protected $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('email@email.com')
            ->setUsername('admin')
            ->setPassword($this->container->get('security.password_encoder')->encodePassword($user, 'admin'));
        $manager->persist($user);
        $manager->flush();
    }
} 