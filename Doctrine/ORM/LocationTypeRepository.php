<?php

namespace Webburza\Sylius\LocationBundle\Doctrine\ORM;

use Sylius\Component\Resource\Repository\RepositoryInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class LocationTypeRepository extends EntityRepository implements RepositoryInterface
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
}
