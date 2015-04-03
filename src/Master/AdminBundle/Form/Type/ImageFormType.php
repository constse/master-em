<?php

namespace Master\AdminBundle\Form\Type;

use Master\SystemBundle\Form\Type\AbstractEntityFormType;
use Symfony\Component\Form\FormBuilderInterface;

class ImageFormType extends AbstractEntityFormType
{
    public function __construct()
    {
        parent::__construct('image', 'Image');
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file', 'file', array('label' => false));
    }
} 