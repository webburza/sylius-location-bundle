<?php

namespace Webburza\Sylius\LocationBundle\Model;

use Sylius\Component\Resource\Model\AbstractTranslation;
use JMS\Serializer\Annotation as JMS;

/**
 * Location.
 *
 * @JMS\ExclusionPolicy("all")
 */
class LocationTranslation extends AbstractTranslation implements LocationTranslationInterface
{
    /**
     * @var int
     *
     * @JMS\Expose()
     */
    protected $id;

    /**
     * @var string
     *
     * @JMS\Expose()
     */
    protected $name;

    /**
     * @var string
     *
     * @JMS\Expose()
     */
    protected $slug;

    /**
     * @var string
     *
     * @JMS\Expose()
     */
    protected $streetName;

    /**
     * @var string
     *
     * @JMS\Expose()
     */
    protected $streetNumber;

    /**
     * @var string
     *
     * @JMS\Expose()
     */
    protected $city;

    /**
     * @var string
     *
     * @JMS\Expose()
     */
    protected $zip;

    /**
     * @var string
     *
     * @JMS\Expose()
     */
    protected $state;

    /**
     * @var string
     *
     * @JMS\Expose()
     */
    protected $country;

    /**
     * @var string
     *
     * @JMS\Expose()
     */
    protected $workingHours;

    /**
     * @var string
     *
     * @JMS\Expose()
     */
    protected $description;

    /**
     * @var string
     *
     * @JMS\Expose()
     */
    protected $metaKeywords;

    /**
     * @var string
     *
     * @JMS\Expose()
     */
    protected $metaDescription;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     *
     * @return $this
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * @param string $streetName
     *
     * @return $this
     */
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @param string $streetNumber
     *
     * @return $this
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     *
     * @return $this
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     *
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getWorkingHours()
    {
        return $this->workingHours;
    }

    /**
     * @param string $workingHours
     *
     * @return $this
     */
    public function setWorkingHours($workingHours)
    {
        $this->workingHours = $workingHours;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * @param string $metaKeywords
     *
     * @return $this
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;

        return $this;
    }

    /**
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * @param string $metaDescription
     *
     * @return $this
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }
}
