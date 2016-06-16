<?php

namespace Webburza\Sylius\LocationBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;

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
        $builder->add('translations', 'a2lix_translationsForms', [
            'form_type' => 'webburza_location_location_translation',
            'label' => 'webburza.sylius.location.translations',
        ]);

        $builder->add('images', Type\CollectionType::class, [
            'label' => 'webburza.sylius.location.label.images',
            'entry_type' => LocationImageType::class,
            'allow_add' => true,
        ]);

        $builder->add('internalName', Type\TextType::class, [
            'label' => 'webburza.sylius.location.label.internal_name',
        ]);

        $builder->add('phone', Type\TextType::class, [
            'label' => 'webburza.sylius.location.label.phone',
        ]);

        $builder->add('email', Type\TextType::class, [
            'label' => 'webburza.sylius.location.label.email',
        ]);

        $builder->add('latitude', Type\TextType::class, [
            'label' => 'webburza.sylius.location.label.latitude',
        ]);

        $builder->add('longitude', Type\TextType::class, [
            'label' => 'webburza.sylius.location.label.longitude',
        ]);

        $builder->add('locationType', 'webburza_location_location_type_choice', [
            'label' => 'webburza.sylius.location.label.type',
        ]);

        $builder->add('published', Type\CheckboxType::class, [
            'label' => 'webburza.sylius.location.label.published',
        ]);
    }

    public function getName()
    {
        return 'webburza_location_location';
    }
}
