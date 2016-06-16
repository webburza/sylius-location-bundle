<?php

namespace Webburza\Sylius\LocationBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;

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
        $builder->add('translations', 'a2lix_translationsForms', [
            'form_type' => 'webburza_location_location_type_translation',
            'label' => 'webburza.sylius.location_type.translations',
        ]);
    }

    public function getName()
    {
        return 'webburza_location_location_type';
    }
}
