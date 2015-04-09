<?php

namespace Master\AdminBundle\Form\Type;

use Master\SystemBundle\Form\Type\AbstractEntityFormType;
use Symfony\Component\Form\FormBuilderInterface;

class CertificateFormType extends AbstractEntityFormType
{
    public function __construct()
    {
        parent::__construct('certificate', 'Certificate');
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('caption', 'text', array('label' => 'Наименование'))
            ->add('image', new ImageFormType(), array('label' => 'Изображение', 'required' => false));
    }
} 