<?php

namespace Webburza\Sylius\LocationBundle\Form\Type;

use Sylius\Bundle\CoreBundle\Form\Type\ImageType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocationImageType extends ImageType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file', 'file', [
            'label' => 'webburza.sylius.location.label.image',
            'property_path' => 'file',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Webburza\Sylius\LocationBundle\Entity\LocationImage',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'webburza_location_location_image';
    }
}
