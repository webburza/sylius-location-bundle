<?php

namespace Webburza\Sylius\LocationBundle\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;

interface LocationTypeInterface extends ResourceInterface, TranslatableInterface
{
    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Get code.
     *
     * @return string
     */
    public function getCode();

    /**
     * @param $code
     */
    public function setCode($code);

    /**
     * Get name.
     *
     * @return string
     */
    public function getName();

    /**
     * @param $name
     */
    public function setName($name);

    /**
     * Get slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return LocationType
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
     * @return LocationType
     */
    public function setUpdatedAt($updatedAt);

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt();
}
