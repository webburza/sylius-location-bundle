<?php

namespace Webburza\Sylius\LocationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\AbstractTranslation;
use Sylius\Component\Resource\Model\ResourceInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation as JMS;

/**
 * Location.
 *
 * @ORM\Table(name="webburza_sylius_location_translation")
 * @ORM\Entity()
 * @JMS\ExclusionPolicy("all")
 */
class LocationTranslation extends AbstractTranslation implements ResourceInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @JMS\Expose()
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @JMS\Expose()
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     * @Gedmo\Slug(fields={"name"}, unique_base="locale")
     * @JMS\Expose()
     */
    protected $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="street_name", type="string", length=255)
     * @Assert\NotBlank()
     * @JMS\Expose()
     */
    protected $streetName;

    /**
     * @var string
     *
     * @ORM\Column(name="street_number", type="string", length=255)
     * @Assert\NotBlank()
     * @JMS\Expose()
     */
    protected $streetNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     * @Assert\NotBlank()
     * @JMS\Expose()
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(name="zip", type="string", length=20)
     * @JMS\Expose()
     */
    protected $zip;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255)
     * @Assert\NotBlank()
     * @JMS\Expose()
     */
    protected $state;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     * @JMS\Expose()
     */
    protected $country;

    /**
     * @var string
     *
     * @ORM\Column(name="working_hours", type="text")
     * @Assert\NotBlank()
     * @JMS\Expose()
     */
    protected $workingHours;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     * @JMS\Expose()
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_keywords", type="text", nullable=true)
     * @JMS\Expose()
     */
    protected $metaKeywords;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_description", type="text", nullable=true)
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
     * @return LocationTranslation
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
     * @return LocationTranslation
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Set street name.
     *
     * @param string $streetName
     *
     * @return LocationTranslation
     */
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;

        return $this;
    }

    /**
     * Get street name.
     *
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * Set street number.
     *
     * @param string $streetNumber
     *
     * @return LocationTranslation
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    /**
     * Get street number.
     *
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * Set city.
     *
     * @param string $city
     *
     * @return LocationTranslation
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set zip.
     *
     * @param string $zip
     *
     * @return LocationTranslation
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip.
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set state.
     *
     * @param string $state
     *
     * @return LocationTranslation
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set country.
     *
     * @param string $country
     *
     * @return LocationTranslation
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country.
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set workingHours.
     *
     * @param string $workingHours
     *
     * @return LocationTranslation
     */
    public function setWorkingHours($workingHours)
    {
        $this->workingHours = $workingHours;

        return $this;
    }

    /**
     * Get workingHours.
     *
     * @return string
     */
    public function getWorkingHours()
    {
        return $this->workingHours;
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
     * @return LocationTranslation
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
     * @return LocationTranslation
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
     * @return LocationTranslation
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }
}
