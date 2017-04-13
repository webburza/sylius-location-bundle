<?php

namespace Webburza\Sylius\LocationBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class WebburzaSyliusLocationExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter(
            'webburza_location.google_maps_enabled', $config['google_maps_enabled']
        );
        $container->setParameter('webburza_location.google_maps_key', $config['google_maps_key']);

        $loader = new Loader\YamlFileLoader(
            $container, new FileLocator(__DIR__ . '/../Resources/config')
        );

        $loader->load('services.yml');
    }
}
