<?php

namespace Webburza\Sylius\LocationBundle\Model;

use Sylius\Component\Resource\Model\AbstractTranslation;
use Sylius\Component\Resource\Model\ResourceInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\ExclusionPolicy("all")
 */
class LocationTypeTranslation extends AbstractTranslation implements LocationTypeTranslationInterface
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
}
