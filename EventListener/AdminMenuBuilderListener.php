<?php

namespace Webburza\Sylius\LocationBundle\EventListener;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

class AdminMenuBuilderListener
{
    /**
     * @param MenuBuilderEvent $event
     */
    public function addMenuItems(MenuBuilderEvent $event)
    {
        $menu = $event->getMenu();

        // Create the menu group
        $locationsMenu = $menu
            ->addChild('webburza_locations')
            ->setLabel('webburza.sylius.location.backend.locations');

        // Add locations
        $locationsMenu
            ->addChild('locations', ['route' => 'webburza_location_location_index'])
            ->setLabel('webburza.sylius.location.backend.locations')
            ->setLabelAttribute('icon', 'marker');

        // Add location types
        $locationsMenu
            ->addChild('location_types', ['route' => 'webburza_location_location_type_index'])
            ->setLabel('webburza.sylius.location.backend.location_types')
            ->setLabelAttribute('icon', 'sitemap');
    }
}
