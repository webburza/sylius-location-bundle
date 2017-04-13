<?php

namespace Webburza\Sylius\LocationBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class LocationTranslationType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
            'label' => 'webburza_location.form.location_translation.name',
        ]);

        $builder->add('streetName', TextType::class, [
            'label'    => 'webburza_location.form.location_translation.street_name',
            'required' => false
        ]);

        $builder->add('streetNumber', TextType::class, [
            'label'    => 'webburza_location.form.location_translation.street_number',
            'required' => false
        ]);

        $builder->add('city', TextType::class, [
            'label'    => 'webburza_location.form.location_translation.city',
            'required' => false
        ]);

        $builder->add('zip', TextType::class, [
            'label'    => 'webburza_location.form.location_translation.zip',
            'required' => false
        ]);

        $builder->add('state', TextType::class, [
            'label'    => 'webburza_location.form.location_translation.state',
            'required' => false
        ]);

        $builder->add('country', TextType::class, [
            'label'    => 'webburza_location.form.location_translation.country',
            'required' => false
        ]);

        $builder->add('workingHours', TextareaType::class, [
            'label'    => 'webburza_location.form.location_translation.working_hours',
            'attr'     => ['rows' => 2],
            'required' => false
        ]);

        $builder->add('description', TextareaType::class, [
            'label'    => 'webburza_location.form.location_translation.description',
            'attr'     => ['rows' => 2],
            'required' => false
        ]);

        $builder->add('metaKeywords', TextareaType::class, [
            'label'    => 'webburza_location.form.location_translation.meta_keywords',
            'attr'     => ['rows' => 2],
            'required' => false
        ]);

        $builder->add('metaDescription', TextareaType::class, [
            'label'    => 'webburza_location.form.location_translation.meta_description',
            'attr'     => ['rows' => 2],
            'required' => false
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'webburza_location_location_translation';
    }
}
