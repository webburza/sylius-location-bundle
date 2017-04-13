<?php

namespace Webburza\Sylius\LocationBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @author Ivan Matas <ivan.matas@locastic.com>
 */
class LocationImageType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file', FileType::class, [
                'label'         => 'webburza_location.form.location_image.file',
                'property_path' => 'file'
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'webburza_location_location_image';
    }
}
