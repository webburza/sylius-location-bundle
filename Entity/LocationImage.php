<?php

namespace Webburza\Sylius\LocationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class LocationImage.
 *
 * @ORM\Table(name="webburza_sylius_location_image")
 * @ORM\Entity()
 */
class LocationImage implements LocationImageInterface
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @var \SplFileInfo
     */
    protected $file;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $path;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $owner;

    /**
     * LocationImage constructor.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * {@inheritdoc}
     */
    public function setFile(\SplFileInfo $file)
    {
        $this->file = $file;
    }

    /**
     * {@inheritdoc}
     */
    public function hasFile()
    {
        return null !== $this->file;
    }

    /**
     * {@inheritdoc}
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * {@inheritdoc}
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * {@inheritdoc}
     */
    public function hasPath()
    {
        return null !== $this->path;
    }

    /**
     * {@inheritdoc}
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * {@inheritdoc}
     */
    public function setOwner(LocationImageAwareInterface $owner = null)
    {
        $this->owner = $owner;
    }

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
