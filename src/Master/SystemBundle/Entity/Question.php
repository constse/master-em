<?php

namespace Master\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Question
 * @package Master\SystemBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name = "questions")
 */
class Question extends AbstractEntity
{
    /**
     * @var string
     * @ORM\Column(name = "caption", type = "string")
     */
    protected $caption;

    /**
     * @var string
     * @ORM\Column(name = "qtext", type = "text")
     */
    protected $text;

    public function getCaption() { return $this->caption; }
    public function getText() { return $this->text; }

    public function setCaption($caption) { $this->caption = $caption; return $this; }
    public function setText($text) { $this->text = $text; return $this; }
} 