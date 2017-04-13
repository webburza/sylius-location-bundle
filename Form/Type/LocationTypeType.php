<?php

namespace Webburza\Sylius\LocationBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Valid;

class LocationTypeType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('code', TextType::class, [
            'label' => 'webburza_location.form.location_type.code',
        ]);

        $builder->add('translations', ResourceTranslationsType::class, [
            'entry_type'  => LocationTypeTranslationType::class,
            'label'       => 'webburza_location.form.location_type.translations',
            'constraints' => [
                new Valid()
            ]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'webburza_location_location_type';
    }
}
