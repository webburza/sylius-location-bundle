<?php

namespace Webburza\Sylius\LocationBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
        $builder->add('translations', ResourceTranslationsType::class, [
            'entry_type' => LocationTranslationType::class,
            'label' => 'webburza.sylius.location.translations',
            'constraints' => [
                new Valid()
            ]
        ]);

        $builder->add('images', CollectionType::class, [
            'label' => 'webburza.sylius.location.label.images',
            'entry_type' => LocationImageType::class,
            'allow_add' => true,
        ]);

        $builder->add('internalName', TextType::class, [
            'label' => 'webburza.sylius.location.label.internal_name',
        ]);

        $builder->add('phone', TextType::class, [
            'label' => 'webburza.sylius.location.label.phone',
        ]);

        $builder->add('email', TextType::class, [
            'label' => 'webburza.sylius.location.label.email',
        ]);

        $builder->add('latitude', TextType::class, [
            'label' => 'webburza.sylius.location.label.latitude',
        ]);

        $builder->add('longitude', TextType::class, [
            'label' => 'webburza.sylius.location.label.longitude',
        ]);

        $builder->add('locationType', LocationTypeChoiceType::class, [
            'label' => 'webburza.sylius.location.label.location_type',
        ]);

        $builder->add('published', CheckboxType::class, [
            'label' => 'webburza.sylius.location.label.published',
        ]);
    }

    public function getName()
    {
        return 'webburza_location_location';
    }
}
