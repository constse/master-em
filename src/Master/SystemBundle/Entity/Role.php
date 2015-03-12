<?php

namespace Master\SystemBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * Class Role
 * @package Master\SystemBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name = "roles")
 */
class Role extends AbstractEntity implements RoleInterface
{
    const ADMIN = 'ROLE_ADMIN';
    const USER = 'ROLE_USER';
    /**
     * @var string
     * @ORM\Column(name = "role", type = "string", unique = true)
     */
    protected $role;

    /**
     * @var ArrayCollection|User
     * @ORM\ManyToMany(targetEntity = "Master\SystemBundle\Entity\User", mappedBy = "roles")
     */
    protected $users;

    public function __construct()
    {
        parent::__construct();

        $this->users = new ArrayCollection();
    }

    public function getRole() { return $this->role; }
    public function getUsers() { return $this->users; }
} 