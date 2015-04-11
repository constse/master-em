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

    /**
     * @var string
     * @ORM\Column(name = "landh1", type = "text")
     */
    protected $landH1;

    /**
     * @var string
     * @ORM\Column(name = "landh2", type = "text", nullable = true)
     */
    protected $landH2;

    /**
     * @var string
     * @ORM\Column(name = "landh3", type = "text", nullable = true)
     */
    protected $landH3;

    public function getForIndex() { return $this->forIndex; }
    public function getForLanding() { return $this->forLanding; }
    public function getIndex() { return $this->index; }
    public function getIndexCaption() { return $this->indexCaption; }
    public function getLandH1() { return $this->landH1; }
    public function getLandH2() { return $this->landH2; }
    public function getLandH3() { return $this->landH3; }

    public function setForIndex(Image $forIndex) { $this->forIndex = $forIndex; return $this; }
    public function setForLanding(Image $forLanding) { $this->forLanding = $forLanding; return $this; }
    public function setIndex($index) { $this->index = $index; return $this; }
    public function setIndexCaption($indexCaption) { $this->indexCaption = $indexCaption; return $this; }
    public function setLandH1($h) { $this->landH1 = $h; return $this; }
    public function setLandH2($h) { $this->landH2 = $h; return $this; }
    public function setLandH3($h) { $this->landH3 = $h; return $this; }
}