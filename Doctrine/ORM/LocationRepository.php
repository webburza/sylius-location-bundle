<?php

namespace Webburza\Sylius\LocationBundle\Doctrine\ORM;

use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Webburza\Sylius\LocationBundle\Model\LocationInterface;
use Webburza\Sylius\LocationBundle\Repository\LocationRepositoryInterface;

class LocationRepository extends EntityRepository implements LocationRepositoryInterface
{
    /**
     * Find a public location by search query.
     *
     * @param string $query
     * @param string $locale
     *
     * @return LocationInterface[]
     */
    public function findPublicByQuery($query, $locale)
    {
        $queryBuilder = $this->createQueryBuilder('o');
        $queryBuilder->leftJoin('o.translations', 'translation')
                     ->where('o.published = true')
                     ->andWhere('translation.locale = :locale');

        $queryBuilder->setParameter('locale', $locale);

        $query = trim($query);

        if (strlen($query)) {
            $whereLike = [];

            foreach ([
                'translation.name',
                'translation.streetName',
                'translation.streetNumber',
                'translation.zip',
                'translation.city',
                'translation.state',
                'translation.country'
            ] as $column) {
                $whereLike[] = $column . ' LIKE :word';
            }

            if (count($whereLike)) {
                $queryBuilder->andWhere(implode(' OR ', $whereLike));
            }

            $queryBuilder->setParameter('word', '%' . $query . '%');
        }

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * Find a publicly visible location by a slug, for the provided locale.
     *
     * @param string $slug
     * @param string $locale
     *
     * @return LocationInterface
     */
    public function findPublicBySlug($slug, $locale)
    {
        $queryBuilder = $this->createQueryBuilder('o');
        $queryBuilder->leftJoin('o.translations', 'translation');

        $queryBuilder
            ->andWhere('translation.slug = :slug')
            ->andWhere('translation.locale = :locale')
            ->andWhere('o.published = true');

        $queryBuilder->setParameters([
            ':slug'   => $slug,
            ':locale' => $locale,
        ]);

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }
}
