<?php

namespace Master\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Review
 * @package Master\SystemBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name = "reviews")
 */
class Review extends AbstractEntity
{
    /**
     * @var string
     * @ORM\Column(name = "reviewfull", type = "text")
     */
    protected $full;

    /**
     * @var Image
     * @ORM\ManyToOne(targetEntity = "Master\SystemBundle\Entity\Image")
     * @ORM\JoinColumn(name = "imageid", referencedColumnName = "id")
     */
    protected $image;

    /**
     * @var string
     * @ORM\Column(name = "name", type = "string")
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(name = "reviewshort", type = "string")
     */
    protected $short;

    /**
     * @var string
     * @ORM\Column(name = "fromto", type = "string")
     */
    protected $to;

    public function getFull() { return $this->full; }
    public function getImage() { return $this->image; }
    public function getName() { return $this->name; }
    public function getShort() { return $this->short; }
    public function getTo() { return $this->to; }

    public function setFull($full) { $this->full = $full; return $this; }
    public function setImage(Image $image) { $this->image = $image; return $this; }
    public function setName($name) { $this->name = $name; return $this; }
    public function setShort($short) { $this->short = $short; return $this; }
    public function setTo($to) { $this->to = $to; return $this; }
} 