<?php

namespace Webburza\Sylius\LocationBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Translation\Model\AbstractTranslatable;
use Sylius\Component\Translation\Model\TranslationInterface;
use JMS\Serializer\Annotation as JMS;

interface LocationInterface extends ResourceInterface, TranslatableInterface
{
    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * @return bool
     */
    public function isPublished();

    /**
     * @param bool $published
     *
     * @return Location
     */
    public function setPublished($published);

    /**
     * Set internalName.
     *
     * @param string $internalName
     *
     * @return Location
     */
    public function setInternalName($internalName);

    /**
     * Get internalName.
     *
     * @return string
     */
    public function getInternalName();

    /**
     * @return LocationType
     */
    public function getLocationType();

    /**
     * @param LocationType
     *
     * @return Location
     */
    public function setLocationType(LocationType $locationType);

    /**
     * Set phone.
     *
     * @param string $phone
     *
     * @return Location
     */
    public function setPhone($phone);

    /**
     * Get phone.
     *
     * @return string
     */
    public function getPhone();

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $email
     */
    public function setEmail($email);

    /**
     * Set latitude.
     *
     * @param string $latitude
     *
     * @return Location
     */
    public function setLatitude($latitude);

    /**
     * Get latitude.
     *
     * @return string
     */
    public function getLatitude();

    /**
     * Set longitude.
     *
     * @param string $longitude
     *
     * @return Location
     */
    public function setLongitude($longitude);

    /**
     * Get longitude.
     *
     * @return string
     */
    public function getLongitude();

    /**
     * @param array|ArrayCollection|LocationImage[] $images
     *
     * @return Location
     */
    public function setImages($images);

    /**
     * @param LocationImage $image
     *
     * @return bool
     */
    public function addImage(LocationImage $image);

    /**
     * Clears images.
     */
    public function clearImages();

    /**
     * @param LocationImage $image
     *
     * @return bool
     */
    public function removeImages(LocationImage $image);

    /**
     * @return ArrayCollection|LocationImage[]
     */
    public function getImages();

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return Location
     */
    public function setCreatedAt($createdAt);

    /**
     * Get createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * Set updatedAt.
     *
     * @param \DateTime $updatedAt
     *
     * @return Location
     */
    public function setUpdatedAt($updatedAt);

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getSlug();

    /**
     * @return string
     */
    public function getStreetName();

    /**
     * @return string
     */
    public function getStreetNumber();

    /**
     * @return string
     */
    public function getCity();

    /**
     * @return string
     */
    public function getZip();

    /**
     * @return string
     */
    public function getState();

    /**
     * @return string
     */
    public function getCountry();

    /**
     * @return string
     */
    public function getWorkingHours();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return string
     */
    public function getMetaKeywords();

    /**
     * @return string
     */
    public function getMetaDescription();

    /**
     * @return string
     */
    public function getStreetAddress();

    /**
     * @return string
     */
    public function getAddress();

    /**
     * @return string
     */
    public function getFullAddress();

    /**
     * @return string
     */
    public function getCoords();
}
