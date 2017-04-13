<?php

namespace Webburza\Sylius\LocationBundle\Model;

use Sylius\Component\Core\Model\Image;

/**
 * Class LocationImage.
 */
class LocationImage extends Image implements LocationImageInterface
{
    /**
     * @var string
     */
    protected $code = '';

    /**
     * @var LocationInterface
     */
    protected $location;

    /**
     * @return LocationInterface
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param LocationInterface $location
     *
     * @return $this
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'webburza_location_image';
    }
}
