<?php

namespace Webburza\Sylius\LocationBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Valid;

class LocationType extends AbstractResourceType
{
    /**
     * Build the Location form.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('translations', 'sylius_translations', [
            'type' => 'webburza_location_location_translation',
            'label' => 'webburza.sylius.location.translations',
            'constraints' => [
                new Valid()
            ]
        ]);

        $builder->add('images', 'collection', [
            'label' => 'webburza.sylius.location.label.images',
            'entry_type' => 'webburza_location_location_image',
            'allow_add' => true,
        ]);

        $builder->add('internalName', 'text', [
            'label' => 'webburza.sylius.location.label.internal_name',
        ]);

        $builder->add('phone', 'text', [
            'label' => 'webburza.sylius.location.label.phone',
        ]);

        $builder->add('email', 'text', [
            'label' => 'webburza.sylius.location.label.email',
        ]);

        $builder->add('latitude', 'text', [
            'label' => 'webburza.sylius.location.label.latitude',
        ]);

        $builder->add('longitude', 'text', [
            'label' => 'webburza.sylius.location.label.longitude',
        ]);

        $builder->add('locationType', 'webburza_location_location_type_choice', [
            'label' => 'webburza.sylius.location.label.type',
        ]);

        $builder->add('published', 'checkbox', [
            'label' => 'webburza.sylius.location.label.published',
        ]);
    }

    public function getName()
    {
        return 'webburza_location_location';
    }
}
