<?php

namespace Webburza\Sylius\LocationBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Valid;

class LocationTypeType extends AbstractResourceType
{
    /**
     * Build the Location Type form.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('translations', ResourceTranslationsType::class , [
            'entry_type' => LocationTypeTranslationType::class,
            'label' => 'webburza.sylius.location_type.translations',
            'constraints' => [
                new Valid()
            ]
        ]);
    }

    public function getName()
    {
        return 'webburza_location_location_type';
    }
}
