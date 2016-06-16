<?php

namespace Webburza\Sylius\LocationBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;

class LocationTranslationType extends AbstractResourceType
{
    /**
     * Build the Location form.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', Type\TextType::class, [
            'label' => 'webburza.sylius.location.label.name',
        ]);

        $builder->add('streetName', Type\TextType::class, [
            'label' => 'webburza.sylius.location.label.street_name',
        ]);

        $builder->add('streetNumber', Type\TextType::class, [
            'label' => 'webburza.sylius.location.label.street_number',
        ]);

        $builder->add('city', Type\TextType::class, [
            'label' => 'webburza.sylius.location.label.city',
        ]);

        $builder->add('zip', Type\TextType::class, [
            'label' => 'webburza.sylius.location.label.zip',
        ]);

        $builder->add('state', Type\TextType::class, [
            'label' => 'webburza.sylius.location.label.state',
        ]);

        $builder->add('country', Type\TextType::class, [
            'label' => 'webburza.sylius.location.label.country',
        ]);

        $builder->add('workingHours', Type\TextareaType::class, [
            'label' => 'webburza.sylius.location.label.working_hours',
            'attr' => ['rows' => 2],
        ]);

        $builder->add('description', Type\TextareaType::class, [
            'label' => 'webburza.sylius.location.label.description',
            'attr' => ['rows' => 2],
        ]);

        $builder->add('metaKeywords', Type\TextareaType::class, [
            'label' => 'webburza.sylius.location.label.meta_keywords',
            'attr' => ['rows' => 2],
        ]);

        $builder->add('metaDescription', Type\TextareaType::class, [
            'label' => 'webburza.sylius.location.label.meta_description',
            'attr' => ['rows' => 2],
        ]);
    }

    public function getName()
    {
        return 'webburza_location_location_translation';
    }
}
