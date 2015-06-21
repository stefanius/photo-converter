<?php

namespace Stef\PhotoConverterBundle\Helper;


class ImageCreator
{
    protected $width;

    protected $height;

    protected $image;

    function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;

        $this->image = imagecreatetruecolor($width, $height);
    }

    public function copyImageResize(Image $sourceImage)
    {
        imagecopyresized($this->image, $sourceImage->getSource(), 0, 0, 0, 0, $this->width, $this->height, $sourceImage->getWidth(), $sourceImage->getHeight());
    }

    public function write($filename = null)
    {
        return imagejpeg($this->image, $filename);
    }
}


