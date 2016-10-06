<?php

namespace Webburza\Sylius\LocationBundle\Doctrine\ORM;

use Sylius\Component\Resource\Repository\RepositoryInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class LocationRepository extends EntityRepository implements RepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createListQueryBuilder()
    {
        return $this->createQueryBuilder('o')
                    ->addSelect('translation')
                    ->leftJoin('o.translations', 'translation')
            ;
    }

    /**
     * Find a public location by search query.
     *
     * @param $query
     * @param $locale
     * @return array
     */
    public function findPublicByQuery($query, $locale)
    {
        $queryBuilder = $this->createQueryBuilder('loc');
        $queryBuilder->leftJoin('loc.translations', 't')
            ->where('loc.published = true')
            ->andWhere('t.locale = :locale');

        $queryBuilder->setParameter('locale', $locale);

        $query = trim($query);
        if (strlen($query)) {
            foreach (array('t.name', 't.streetName', 't.streetNumber', 't.zip', 't.city', 't.state', 't.country') as $column) {
                $whereLike[] = $column.' LIKE :word';
            }

            if (count($whereLike)) {
                $queryBuilder->andWhere(implode(' OR ', $whereLike));
            }

            $queryBuilder->setParameter('word', '%'.$query.'%');
        }

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * Find a publicly visible location by a slug, for the provided locale.
     *
     * @param $slug
     * @param $locale
     *
     * @return array
     */
    public function findPublicBySlug($slug, $locale)
    {
        $queryBuilder = $this->createQueryBuilder('loc');
        $queryBuilder->leftJoin('loc.translations', 't');

        $queryBuilder
            ->andWhere('t.slug = :slug')
            ->andWhere('t.locale = :locale')
            ->andWhere('loc.published = true');

        $queryBuilder->setParameters([
            ':slug' => $slug,
            ':locale' => $locale,
        ]);

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }
}
