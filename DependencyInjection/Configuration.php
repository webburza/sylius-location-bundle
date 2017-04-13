<?php

namespace Webburza\Sylius\LocationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('webburza_location');

        $rootNode
            ->children()
                ->booleanNode('google_maps_enabled')->end()
                ->scalarNode('google_maps_key')->end()
            ->end();

        return $treeBuilder;
    }
}
