<?php

namespace Master\SystemBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface as SymfonyUserInterface;

/**
 * Class User
 * @package Master\SystemBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name = "users")
 */
class User extends AbstractEntity implements UserInterface
{
    /**
     * @var string
     * @ORM\Column(name = "email", type = "string", unique = true)
     */
    protected $email;

    /**
     * @var bool
     * @ORM\Column(name = "enabled", type = "boolean")
     */
    protected $enabled;

    /**
     * @var bool
     * @ORM\Column(name = "locked", type = "boolean")
     */
    protected $locked;

    /**
     * @var string
     * @ORM\Column(name = "password", type = "string")
     */
    protected $password;

    /**
     * @var ArrayCollection|Role
     * @ORM\ManyToMany(targetEntity = "Master\SystemBundle\Entity\Role", inversedBy = "users")
     * @ORM\JoinTable(name = "user_roles",
     *   joinColumns = {@ORM\JoinColumn(name = "userid", referencedColumnName = "id")},
     *   inverseJoinColumns = {@ORM\JoinColumn(name = "roleid", referencedColumnName = "id")}
     * )
     */
    protected $roles;

    /**
     * @var string
     * @ORM\Column(name = "salt", type = "string")
     */
    protected $salt;

    /**
     * @var string
     * @ORM\Column(name = "username", type = "string", unique = true)
     */
    protected $username;

    public function __construct()
    {
        parent::__construct();

        $this->enabled = false;
        $this->locked = false;
        $this->roles = new ArrayCollection();
        $this->salt = self::generateSalt();
    }

    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }
    public function getSalt() { return $this->salt; }
    public function getUsername() { return $this->username; }
    public function isEnabled() { return $this->enabled; }
    public function isLocked() { return $this->locked; }

    public function setEmail($email) { $this->email = $email; return $this; }
    public function setEnabled($enabled) { $this->enabled = $enabled; return $this; }
    public function setLocked($locked) { $this->locked = $locked; return $this; }
    public function setPassword($password) { $this->password = $password; return $this; }
    public function setSalt($salt) { $this->salt = $salt; return $this; }
    public function setUsername($username) { $this->username = $username; return $this; }

    public function eraseCredentials()
    {
        return $this;
    }

    public static function generateSalt()
    {
        $symbols = '0123456789abcdef';
        $salt = '';

        foreach (range(1, 32) as $i) $salt .= $symbols[mt_rand(0, 15)];

        return $salt;
    }

    public function getRolesAsCollection() { return $this->roles; }

    public function getRoles()
    {
        return $this->roles->toArray();
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return !$this->locked;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEqualTo(SymfonyUserInterface $user)
    {
        return ($this->username === $user->getUsername())
        && ($this->password === $user->getPassword())
        && ($this->salt === $user->getSalt());
    }

    public function serialize()
    {
        return serialize(array(
            'id' => $this->id,
            'username' => $this->username,
            'password' => $this->password,
            'salt' => $this->salt
        ));
    }

    public function unserialize($serialized)
    {
        $unserialized = unserialize($serialized);
        $this->id = $unserialized['id'];
        $this->username = $unserialized['username'];
        $this->password = $unserialized['password'];
        $this->salt = $unserialized['salt'];

        return $this;
    }
} 