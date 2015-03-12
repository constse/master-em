<?php

namespace Master\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractEntity
 * @package Master\SystemBundle\Entity
 * @ORM\MappedSuperclass
 */
class AbstractEntity
{
    /**
     * @var \DateTime
     * @ORM\Column(name = "created", type = "datetime")
     */
    protected $created;

    /**
     * @var int
     * @ORM\Column(name = "id", type = "integer")
     * @ORM\Id;
     * @ORM\GeneratedValue(strategy = "AUTO")
     */
    protected $id;

    /**
     * @var \DateTime
     * @ORM\Column(name = "modified", type = "datetime")
     */
    protected $modified;

    public function __construct()
    {
        $this->created = new \DateTime();
        $this->modified = new \DateTime();
    }

    public function getCreated() { return $this->created; }
    public function getId() { return $this->id; }
    public function getModified() { return $this->modified; }

    /**
     * @return $this
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->modified = new \DateTime();

        return $this;
    }
} 