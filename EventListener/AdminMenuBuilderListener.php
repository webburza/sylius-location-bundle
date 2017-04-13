<?php

namespace Webburza\Sylius\LocationBundle\EventListener;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuBuilderListener
{
    /**
     * @param MenuBuilderEvent $event
     */
    public function addAdminMenuItems(MenuBuilderEvent $event)
    {
        $menu = $event->getMenu();

        // Get or create the parent group
        if (null == ($parentItem = $menu->getChild('configuration'))) {
            $parentItem = $menu->addChild('configuration')->setLabel('webburza_location.ui.configuration');
        }

        // Add 'Locations' menu item
        $parentItem->addChild('webburza_locations', ['route' => 'webburza_location_admin_location_index'])
                    ->setLabel('webburza_location.ui.locations')
                    ->setLabelAttribute('icon', 'marker');

        // Add 'Location Types' menu item
        $parentItem->addChild('webburza_location_types', ['route' => 'webburza_location_admin_location_type_index'])
                    ->setLabel('webburza_location.ui.location_types')
                    ->setLabelAttribute('icon', 'sitemap');

    }
}
