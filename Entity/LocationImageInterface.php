<?php

namespace Webburza\Sylius\LocationBundle\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;

interface LocationImageInterface extends ResourceInterface
{
    /**
     * @return null|\SplFileInfo
     */
    public function getFile();

    /**
     * @param \SplFileInfo $file
     */
    public function setFile(\SplFileInfo $file);

    /**
     * @return bool
     */
    public function hasFile();

    /**
     * @return string
     */
    public function getPath();

    /**
     * @param string $path
     */
    public function setPath($path);

    /**
     * @return LocationImageAwareInterface
     */
    public function getOwner();

    /**
     * @param LocationImageAwareInterface|null $owner
     */
    public function setOwner(LocationImageAwareInterface $owner = null);
}
