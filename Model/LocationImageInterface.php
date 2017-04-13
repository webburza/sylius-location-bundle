<?php

namespace Webburza\Sylius\LocationBundle\Model;

use Sylius\Component\Core\Model\ImageInterface;

interface LocationImageInterface extends ImageInterface
{
    /**
     * @return LocationInterface
     */
    public function getLocation();

    /**
     * @param LocationInterface $location
     *
     * @return $this
     */
    public function setLocation($location);
}
