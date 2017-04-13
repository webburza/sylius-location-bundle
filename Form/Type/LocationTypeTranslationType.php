<?php

namespace Webburza\Sylius\LocationBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class LocationTypeTranslationType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
            'label' => 'webburza_location.form.location_type_translation.name',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'webburza_location_location_type_translation';
    }
}
