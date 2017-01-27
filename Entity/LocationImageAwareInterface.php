<?php

namespace Webburza\Sylius\LocationBundle\Entity;

use Doctrine\Common\Collections\Collection;

/**
 * @author Ivan Matas <ivan.matas@locastic.com>
 */
interface LocationImageAwareInterface
{
    /**
     * @return Collection|LocationImageInterface[]
     */
    public function getImages();


    /**
     * @return bool
     */
    public function hasImages();

    /**
     * @param LocationImageInterface $image
     *
     * @return bool
     */
    public function hasImage(LocationImageInterface $image);

    /**
     * @param LocationImageInterface $image
     */
    public function addImage(LocationImageInterface $image);

    /**
     * @param LocationImageInterface $image
     */
    public function removeImage(LocationImageInterface $image);
}
