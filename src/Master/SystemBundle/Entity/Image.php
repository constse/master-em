<?php

namespace Master\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class Image
 * @package Master\SystemBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name = "images")
 */
class Image extends AbstractEntity
{
    const PUBLIC_DIR = '/web';

    /**
     * @var UploadedFile
     */
    protected $file;

    /**
     * @var string
     * @ORM\Column(name = "path", type = "string")
     */
    protected $path;

    /**
     * @var string
     */
    protected $uploadDir;

    public function __construct()
    {
        parent::__construct();

        $this->uploadDir = '/uploads';
    }

    /**
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getUploadDir()
    {
        return $this->uploadDir;
    }

    /**
     * @ORM\PostRemove
     */
    public function postRemove()
    {
        $path = $this->getRootDir() . '/' . $this->path;

        if (file_exists($path)) unlink($path);
    }

    /**
     * @param UploadedFile $file
     * @return $this
     */
    public function setFile(UploadedFile $file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @param string $path
     * @return $this
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @param string $uploadDir
     * @return $this
     */
    public function setUploadDir($uploadDir)
    {
        $this->uploadDir = $uploadDir;

        return $this;
    }

    /**
     * @return null|File
     */
    public function upload()
    {
        if (is_null($this->file)) return null;

        $file = $this->file;
        $this->file = null;

        if (!is_null($this->path) && file_exists($this->getRootDir() . $this->path))
            unlink($this->getRootDir() . $this->path);

        $extension = $file->getClientOriginalExtension();
//        $extension = $file->guessExtension();
//        if (is_null($extension)) $extension = $file->guessClientExtension();
//        if (is_null($extension)) $extension = $file->getClientOriginalExtension();

        $path = $file->getClientOriginalName();
        $basename = basename($path, $file->getClientOriginalExtension());
        $path = $basename . $extension;
        $i = 1;

        while (file_exists($this->getUploadRootDir() . '/' . $path)) {
            $path = $basename . $i . '.' . $extension;
            ++$i;
        }

        $this->path = $this->uploadDir . '/' . $path;

        return $file->move($this->getUploadRootDir(), $path);
    }

    protected function getRootDir()
    {
        return __DIR__ . '/../../../..' . self::PUBLIC_DIR;
    }

    protected function getUploadRootDir()
    {
        return $this->getRootDir() . $this->uploadDir;
    }
} 