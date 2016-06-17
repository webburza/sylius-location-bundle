<?php

namespace Webburza\Sylius\LocationBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
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
        $builder->add('translations', 'sylius_translations', [
            'type' => 'webburza_location_location_type_translation',
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
