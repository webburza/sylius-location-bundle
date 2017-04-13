<?php

namespace Webburza\Sylius\LocationBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Resource\Model\TranslatableTrait;
use JMS\Serializer\Annotation as JMS;

/**
 * Location.
 * @JMS\ExclusionPolicy("all")
 */
class Location implements LocationInterface
{
    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
    }

    /**
     * @var int
     * @JMS\Expose()
     */
    protected $id;

    /**
     * @var bool
     */
    protected $published = false;

    /**
     * @var string
     */
    protected $internalName;

    /**
     * @var LocationType
     * @JMS\Expose()
     */
    protected $locationType;

    /**
     * @var string
     * @JMS\Expose()
     */
    protected $phone;

    /**
     * @var string
     * @JMS\Expose()
     */
    protected $email;

    /**
     * @var string
     * @JMS\Expose()
     */
    protected $latitude;

    /**
     * @var string
     * @JMS\Expose()
     */
    protected $longitude;

    /**
     * @var LocationImageInterface[]
     * @JMS\Expose()
     */
    protected $images;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * Location constructor.
     */
    public function __construct()
    {
        $this->initializeTranslationsCollection();
        $this->images = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isPublished()
    {
        return $this->published;
    }

    /**
     * @param bool $published
     *
     * @return $this
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Set internalName.
     *
     * @param string $internalName
     *
     * @return $this
     */
    public function setInternalName($internalName)
    {
        $this->internalName = $internalName;

        return $this;
    }

    /**
     * Get internalName.
     *
     * @return string
     */
    public function getInternalName()
    {
        return $this->internalName;
    }

    /**
     * @return LocationTypeInterface
     */
    public function getLocationType()
    {
        return $this->locationType;
    }

    /**
     * @param LocationTypeInterface
     *
     * @return $this
     */
    public function setLocationType(LocationTypeInterface $locationType)
    {
        $this->locationType = $locationType;

        return $this;
    }

    /**
     * Set phone.
     *
     * @param string $phone
     *
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Set latitude.
     *
     * @param string $latitude
     *
     * @return $this
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude.
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude.
     *
     * @param string $longitude
     *
     * @return $this
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude.
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime $updatedAt
     *
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getTranslation()->getName();
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->getTranslation()->getSlug();
    }

    /**
     * @return string
     */
    public function getStreetName()
    {
        return $this->getTranslation()->getStreetName();
    }

    /**
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->getTranslation()->getStreetNumber();
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->getTranslation()->getCity();
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->getTranslation()->getZip();
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->getTranslation()->getState();
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->getTranslation()->getCountry();
    }

    /**
     * @return string
     */
    public function getWorkingHours()
    {
        return $this->getTranslation()->getWorkingHours();
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getTranslation()->getDescription();
    }

    /**
     * @return string
     */
    public function getMetaKeywords()
    {
        return $this->getTranslation()->getMetaKeywords();
    }

    /**
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->getTranslation()->getMetaDescription();
    }

    /**
     * @return string
     */
    public function getStreetAddress()
    {
        $streetAddress = $this->getStreetName() . ' ' . $this->getStreetNumber();

        return trim($streetAddress);
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        $address = '';

        $fragments = [
            $this->getStreetAddress(),
            $this->getCity()
        ];

        foreach ($fragments as $fragment) {
            if ($fragment) {
                $address .= ', ' . $fragment;
            }
        }

        return trim($address, ', ');
    }

    /**
     * @return string
     */
    public function getFullAddress()
    {
        $address = '';

        $fragments = [
            $this->getStreetAddress(),
            $this->getZip(),
            $this->getCity(),
            $this->getCountry()
        ];

        foreach ($fragments as $fragment) {
            if ($fragment) {
                $address .= ', ' . $fragment;
            }
        }

        return trim($address, ', ');
    }

    /**
     * @return string
     */
    public function getCoords()
    {
        return $this->getLatitude() . ',' . $this->getLongitude();
    }

    /**
     * {@inheritdoc}
     */
    protected function createTranslation()
    {
        return new LocationTranslation();
    }

    /**
     * {@inheritdoc}
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * {@inheritdoc}
     */
    public function getImageByCode($code)
    {
        foreach ($this->images as $image) {
            if ($code === $image->getCode()) {
                return $image;
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function hasImages()
    {
        return !$this->images->isEmpty();
    }

    /**
     * {@inheritdoc}
     */
    public function hasImage(ImageInterface $image)
    {
        return $this->images->contains($image);
    }

    /**
     * @param ImageInterface|LocationImageInterface $image
     */
    public function addImage(ImageInterface $image)
    {
        $image->setLocation($this);

        $this->images->add($image);
    }

    /**
     * @param ImageInterface|LocationImageInterface $image
     */
    public function removeImage(ImageInterface $image)
    {
        if ($this->hasImage($image)) {
            $image->setLocation(null);
            $this->images->removeElement($image);
        }
    }
}
