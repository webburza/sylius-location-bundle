<?php

namespace Webburza\Sylius\LocationBundle\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\Translation\Translator;

final class AdminMenuListener
{
    /**
     * @var Translator
     */
    protected $translator;

    /**
     * MenuBuilderListener constructor.
     *
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }


    /**
     * @param MenuBuilderEvent $event
     */
    public function addAdminMenuItems(MenuBuilderEvent $event)
    {
        $menu = $event->getMenu();

        $location = $menu
            ->addChild('webburza_sylius_locations', ['route' => 'webburza_location_location_index'])
            ->setLabel('webburza.sylius.location.backend.locations')
            ->setLabelAttribute('icon', 'glyphicon glyphicon-flag');

        $location
            ->addChild('webburza_sylius_locations', array(
                'route' => 'webburza_location_location_index',
                'labelAttributes' => array('icon' => 'glyphicon glyphicon-flag'),
            ))
            ->setLabel($this->translator->trans('webburza.sylius.location.backend.locations'));

        $location
            ->addChild('webburza_sylius_location_types', array(
                'route' => 'webburza_location_location_type_index',
                'labelAttributes' => array('icon' => 'glyphicon glyphicon-cog'),
            ))
            ->setLabel($this->translator->trans('webburza.sylius.location.backend.location_types'));
    }
}