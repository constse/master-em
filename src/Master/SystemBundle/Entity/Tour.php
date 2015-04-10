<?php

namespace Master\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Tour
 * @package Master\SystemBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name = "tours")
 */
class Tour extends AbstractEntity
{
    const LOCATION_FOREIGN = 0;
    const LOCATION_ALTAI = 1;
    const LOCATION_RUSSIA = 2;

    const TEMPLATE0 = 0;
    const TEMPLATE1 = 1;
    const TEMPLATE2 = 2;

    const TYPE_NEW = 0;
    const TYPE_LATEST = 1;
    const TYPE_OFFER = 2;

    /**
     * @var string
     * @ORM\Column(name = "caption", type = "string")
     */
    protected $caption;

    /**
     * @var string
     * @ORM\Column(name = "days", type = "string", nullable = true)
     */
    protected $days;

    /**
     * @var string
     * @ORM\COlumn(name = "tourfrom", type = "string", nullable = true)
     */
    protected $from;

    /**
     * @var Image
     * @ORM\ManyToOne(targetEntity = "Master\SystemBundle\Entity\Image")
     * @ORM\JoinColumn(name = "imageid", referencedColumnName = "id", nullable = true)
     */
    protected $image;

    /**
     * @var int
     * @ORM\Column(name = "landing", type = "integer")
     */
    protected $landing;

    /**
     * @var int
     * @ORM\Column(name = "location", type = "integer")
     */
    protected $location;

    /**
     * @var int
     * @ORM\Column(name = "price", type = "integer")
     */
    protected $price;

    /**
     * @var int
     * @ORM\Column(name = "template", type = "integer")
     */
    protected $template;

    /**
     * @var int
     * @ORM\Column(name = "tourtype", type = "integer")
     */
    protected $type;

    public function __construct()
    {
        parent::__construct();

        $this->landing = 1;
        $this->location = self::LOCATION_FOREIGN;
        $this->price = 0;
        $this->template = self::TEMPLATE0;
        $this->type = self::TYPE_NEW;
    }

    public function getCaption() { return $this->caption; }
    public function getDays() { return $this->days; }
    public function getFrom() { return $this->from; }
    public function getImage() { return $this->image; }
    public function getLanding() { return $this->landing; }
    public function getLocation() { return $this->location; }
    public function getPrice() { return $this->price; }
    public function getTemplate() { return $this->template; }
    public function getType() { return $this->type; }

    public function setCaption($caption) { $this->caption = $caption; return $this; }
    public function setDays($days) { $this->days = $days; return $this; }
    public function setFrom($from) { $this->from = $from; return $this; }
    public function setImage(Image $image) { $this->image = $image; return $this; }
    public function setLanding($landing) { $this->landing = $landing; return $this; }
    public function setLocation($location) { $this->location = $location; return $this; }
    public function setPrice($price) { $this->price = $price; return $this; }
    public function setTemplate($template) { $this->template = $template; return $this; }
    public function setType($type) { $this->type = $type; return $this; }
} 