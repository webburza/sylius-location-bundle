<?php

namespace Webburza\Sylius\LocationBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Valid;

class LocationType extends AbstractResourceType
{
    /**
     * Build the Location form.
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('translations', 'sylius_translations', [
            'type'        => 'webburza_location_location_translation',
            'label'       => 'webburza.sylius.location.translations',
            'constraints' => [
                new Valid()
            ]
        ]);

        $builder->add('images', 'collection', [
            'type'         => 'webburza_location_location_image',
            'allow_add'    => true,
            'allow_delete' => true,
            'by_reference' => false,
            'label'        => 'webburza.sylius.location.label.images',
        ]);

        $builder->add('internalName', 'text', [
            'label'       => 'webburza.sylius.location.label.internal_name',
            'constraints' => [
                new NotBlank()
            ]
        ]);

        $builder->add('phone', 'text', [
            'label' => 'webburza.sylius.location.label.phone',
        ]);

        $builder->add('email', 'text', [
            'label'       => 'webburza.sylius.location.label.email',
            'constraints' => [
                new Email()
            ]
        ]);

        $builder->add('latitude', 'text', [
            'label' => 'webburza.sylius.location.label.latitude',
        ]);

        $builder->add('longitude', 'text', [
            'label' => 'webburza.sylius.location.label.longitude',
        ]);

        $builder->add('locationType', 'webburza_location_location_type_choice', [
            'label'       => 'webburza.sylius.location.label.type',
            'constraints' => [
                new NotBlank()
            ]
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
