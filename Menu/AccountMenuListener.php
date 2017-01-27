<?php

namespace Webburza\Sylius\LocationBundle\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\TranslatorInterface;

final class AccountMenuListener
{
    /**
     * @var Translator
     */
    protected $translator;

    /**
     * FrontendMenuBuilderListener constructor.
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
    public function addAccountMenuItems(MenuBuilderEvent $event)
    {
        $menu = $event->getMenu();

        $menu->addChild('webburza_sylius_locations_front', ['route' => 'webburza_location_frontend_index',
            'linkAttributes' => [
                'title' => $this->translator->trans('webburza.sylius.location.index_header'),
            ],
            'labelAttributes' => [
                'icon' => 'icon-building icon-large',
                'iconOnly' => false,
            ],
        ])->setLabel($this->translator->trans('webburza.sylius.location.frontend.locations'));
    }
}
