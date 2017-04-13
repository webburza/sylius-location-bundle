<?php

namespace Webburza\Sylius\LocationBundle\Repository;

use Sylius\Component\Resource\Repository\RepositoryInterface;
use Webburza\Sylius\LocationBundle\Model\LocationInterface;

interface LocationRepositoryInterface extends RepositoryInterface
{
    /**
     * Find a public location by search query.
     *
     * @param string $query
     * @param string $locale
     *
     * @return LocationInterface[]
     */
    public function findPublicByQuery($query, $locale);

    /**
     * Find a publicly visible location by a slug, for the provided locale.
     *
     * @param string $slug
     * @param string $locale
     *
     * @return LocationInterface
     */
    public function findPublicBySlug($slug, $locale);
}
