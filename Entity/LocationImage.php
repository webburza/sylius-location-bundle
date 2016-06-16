<?php

namespace Webburza\Sylius\LocationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Core\Model\Image;

/**
 * Class LocationImage.
 *
 * @ORM\Table(name="webburza_sylius_location_image")
 * @ORM\Entity()
 */
class LocationImage extends Image implements ResourceInterface
{
    /**
     * The associated location.
     *
     * @var Location
     * @ORM\ManyToOne(targetEntity="Location", inversedBy="images")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    protected $location;

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Location $location
     *
     * @return LocationImage
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
