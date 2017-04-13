<?php

namespace Webburza\Sylius\LocationBundle\Model;

use Sylius\Component\Resource\Model\ResourceInterface;

interface LocationTypeTranslationInterface extends ResourceInterface
{
    /**
     * @return int
     */
    public function getId();

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
}
