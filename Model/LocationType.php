<?php

namespace Webburza\Sylius\LocationBundle\Model;

use JMS\Serializer\Annotation as JMS;
use Sylius\Component\Resource\Model\TranslatableTrait;

/**
 * LocationType.
 *
 * @JMS\ExclusionPolicy("all")
 */
class LocationType implements LocationTypeInterface
{
    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
    }

    /**
     * @var int
     *
     * @JMS\Expose()
     */
    protected $id;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * LocationType constructor.
     */
    public function __construct()
    {
        $this->initializeTranslationsCollection();
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
     * Get code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param $code
     *
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->getTranslation()->getName();
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->getTranslation()->setName($name);
    }

    /**
     * Get slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->getTranslation()->getSlug();
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return LocationType
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
     * @return LocationType
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
     * {@inheritdoc}
     */
    protected function createTranslation()
    {
        return new LocationTypeTranslation();
    }
}
