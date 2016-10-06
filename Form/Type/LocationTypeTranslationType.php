<?php

namespace Webburza\Sylius\LocationBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class LocationTypeTranslationType extends AbstractResourceType
{
    /**
     * Build the Location Type Translation form.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', [
            'label' => 'webburza.sylius.location_type.label.name',
            'constraints' => [
                new NotBlank()
            ]
        ]);
    }

    public function getName()
    {
        return 'webburza_location_location_type_translation';
    }
}
