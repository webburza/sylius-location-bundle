<?php

namespace Webburza\Sylius\LocationBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Sylius\Component\Core\Model\ImageAwareInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;
use JMS\Serializer\Annotation as JMS;

interface LocationInterface extends ResourceInterface, TranslatableInterface, ImageAwareInterface
{
    /**
     * @return bool
     */
    public function isPublished();

    /**
     * @param bool $published
     *
     * @return $this
     */
    public function setPublished($published);

    /**
     * Set internalName.
     *
     * @param string $internalName
     *
     * @return $this
     */
    public function setInternalName($internalName);

    /**
     * Get internalName.
     *
     * @return string
     */
    public function getInternalName();

    /**
     * @return LocationTypeInterface
     */
    public function getLocationType();

    /**
     * @param LocationTypeInterface
     *
     * @return $this
     */
    public function setLocationType(LocationTypeInterface $locationType);

    /**
     * Set phone.
     *
     * @param string $phone
     *
     * @return $this
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
     * @return $this
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
     * @return $this
     */
    public function setLongitude($longitude);

    /**
     * Get longitude.
     *
     * @return string
     */
    public function getLongitude();

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return $this
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
     * @return $this
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
