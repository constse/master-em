<?php

namespace Master\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Certificate
 * @package Master\SystemBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name = "certificates")
 */
class Certificate extends AbstractEntity
{
    /**
     * @var string
     * @ORM\Column(name = "caption", type = "string")
     */
    protected $caption;

    /**
     * @var Image
     * @ORM\ManyToOne(targetEntity = "Master\SystemBundle\Entity\Image")
     * @ORM\JoinColumn(name = "imageid", referencedColumnName = "id")
     */
    protected $image;

    /**
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @return Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $caption
     * @return $this
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * @param Image $image
     * @return $this
     */
    public function setImage(Image $image)
    {
        $this->image = $image;

        return $this;
    }
} 