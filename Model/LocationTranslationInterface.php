<?php

namespace Webburza\Sylius\LocationBundle\Model;

use Sylius\Component\Resource\Model\ResourceInterface;

interface LocationTranslationInterface extends ResourceInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getSlug();

    /**
     * @param string $slug
     *
     * @return $this
     */
    public function setSlug($slug);

    /**
     * @return string
     */
    public function getStreetName();

    /**
     * @param string $streetName
     *
     * @return $this
     */
    public function setStreetName($streetName);

    /**
     * @return string
     */
    public function getStreetNumber();

    /**
     * @param string $streetNumber
     *
     * @return $this
     */
    public function setStreetNumber($streetNumber);

    /**
     * @return string
     */
    public function getCity();

    /**
     * @param string $city
     *
     * @return $this
     */
    public function setCity($city);

    /**
     * @return string
     */
    public function getZip();

    /**
     * @param string $zip
     *
     * @return $this
     */
    public function setZip($zip);

    /**
     * @return string
     */
    public function getState();

    /**
     * @param string $state
     *
     * @return $this
     */
    public function setState($state);

    /**
     * @return string
     */
    public function getCountry();

    /**
     * @param string $country
     *
     * @return $this
     */
    public function setCountry($country);

    /**
     * @return string
     */
    public function getWorkingHours();

    /**
     * @param string $workingHours
     *
     * @return $this
     */
    public function setWorkingHours($workingHours);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getMetaKeywords();

    /**
     * @param string $metaKeywords
     *
     * @return $this
     */
    public function setMetaKeywords($metaKeywords);

    /**
     * @return string
     */
    public function getMetaDescription();

    /**
     * @param string $metaDescription
     *
     * @return $this
     */
    public function setMetaDescription($metaDescription);
}
