<?php

namespace Stef\PhotoConverterBundle\Helper;

class Image
{
    protected $pathAndFileName;

    protected $filename;

    protected $path;

    protected $parentFolderName;

    protected $width;

    protected $height;

    function __construct($pathAndFileName)
    {
        if (!file_exists($pathAndFileName)) {
            throw new \Exception('File not found');
        }

        $this->pathAndFileName = $pathAndFileName;

        $this->path = dirname($pathAndFileName);
        $this->filename = trim(str_replace($this->path, '', $pathAndFileName), '/');
        $parentFolderPath = dirname($this->path);
        $this->parentFolderName = trim(str_replace($parentFolderPath, '', $this->path), '/');
    }

    /**
     * @return string
     */
    public function getPathAndFileName()
    {
        return $this->pathAndFileName;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
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
    public function getParentFolderName()
    {
        return $this->parentFolderName;
    }

    public function getWidth()
    {
        if ($this->width === null) {
            $this->readImageSizeFromFile();
        }

        return $this->width;
    }

    public function getHeight()
    {
        if ($this->height === null) {
            $this->readImageSizeFromFile();
        }

        return $this->height;
    }

    public function getSource()
    {
        return imagecreatefromjpeg($this->pathAndFileName);
    }

    protected function readImageSizeFromFile()
    {
        list($width, $height) = getimagesize($this->pathAndFileName);
        $this->height = $height;
        $this->width = $width;
    }
}