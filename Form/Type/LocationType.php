<?php

namespace Webburza\Sylius\LocationBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Valid;

class LocationType extends AbstractResourceType
{
    /**
     * @var string
     */
    protected $locationTypeClass;

    /**
     * @param string $dataClass FQCN
     * @param string[] $validationGroups
     * @param string $locationTypeClass
     */
    public function __construct($dataClass, array $validationGroups = [], $locationTypeClass)
    {
        parent::__construct($dataClass, $validationGroups);

        $this->locationTypeClass = $locationTypeClass;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('translations', ResourceTranslationsType::class, [
            'entry_type'  => LocationTranslationType::class,
            'label'       => 'webburza_location.form.location.translations',
            'constraints' => [
                new Valid()
            ]
        ]);

        $builder->add('internalName', TextType::class, [
            'label' => 'webburza_location.form.location.internal_name'
        ]);

        $builder->add('published', CheckboxType::class, [
            'label' => 'webburza_location.form.location.published'
        ]);

        $builder->add('phone', TextType::class, [
            'label'    => 'webburza_location.form.location.phone',
            'required' => false
        ]);

        $builder->add('email', TextType::class, [
            'label'    => 'webburza_location.form.location.email',
            'required' => false
        ]);

        $builder->add('latitude', TextType::class, [
            'label'    => 'webburza_location.form.location.latitude',
            'required' => false
        ]);

        $builder->add('longitude', TextType::class, [
            'label'    => 'webburza_location.form.location.longitude',
            'required' => false
        ]);

        $builder->add('locationType', EntityType::class, [
            'label'        => 'webburza_location.form.location.location_type',
            'class'        => $this->locationTypeClass,
            'choice_label' => 'name',
            'choice_value' => 'id'
        ]);

        $builder->add('images', CollectionType::class, [
            'label'        => 'webburza_location.form.location.images',
            'entry_type'   => LocationImageType::class,
            'allow_add'    => true,
            'allow_delete' => true,
            'required'     => false
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'webburza_location_location';
    }
}
