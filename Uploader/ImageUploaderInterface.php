<?php

namespace Webburza\Sylius\LocationBundle\Uploader;

use Webburza\Sylius\LocationBundle\Entity\LocationImageInterface;

interface ImageUploaderInterface
{
    /**
     * @param LocationImageInterface $image
     */
    public function upload(LocationImageInterface $image);

    /**
     * @param string $path
     */
    public function remove($path);
}
