<?php

namespace Master\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Landing
 * @package Master\SystemBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name = "landings")
 */
class Landing extends AbstractEntity
{
    /**
     * @var Image
     * @ORM\ManyToOne(targetEntity = "Master\SystemBundle\Entity\Image")
     * @ORM\JoinColumn(name = "forindexid", referencedColumnName = "id")
     */
    protected $forIndex;

    /**
     * @var Image
     * @ORM\ManyToOne(targetEntity = "Master\SystemBundle\Entity\Image")
     * @ORM\JoinColumn(name = "forlandingid", referencedColumnName = "id")
     */
    protected $forLanding;

    /**
     * @var int
     * @ORM\Column(name = "landindex", type = "integer")
     */
    protected $index;

    /**
     * @var string
     * @ORM\Column(name = "indexcaption", type = "string")
     */
    protected $indexCaption;

    public function getForIndex() { return $this->forIndex; }
    public function getForLanding() { return $this->forLanding; }
    public function getIndex() { return $this->index; }
    public function getIndexCaption() { return $this->indexCaption; }

    public function setForIndex(Image $forIndex) { $this->forIndex = $forIndex; return $this; }
    public function setForLanding(Image $forLanding) { $this->forLanding = $forLanding; return $this; }
    public function setIndex($index) { $this->index = $index; return $this; }
    public function setIndexCaption($indexCaption) { $this->indexCaption = $indexCaption; return $this; }
} 