<?php

namespace Master\SystemBundle\Entity;

use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;

interface UserInterface extends AdvancedUserInterface, EquatableInterface, \Serializable
{
} 