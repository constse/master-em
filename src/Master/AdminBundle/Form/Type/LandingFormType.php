<?php

namespace Master\AdminBundle\Form\Type;

use Master\SystemBundle\Form\Type\AbstractEntityFormType;
use Symfony\Component\Form\FormBuilderInterface;

class LandingFormType extends AbstractEntityFormType
{
    public function __construct()
    {
        parent::__construct('landing', 'Landing');
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('forIndex', new ImageFormType(), array('label' => 'Изображение для главной', 'required' => false))
            ->add('indexCaption', 'textarea', array('label' => 'Заголовок для слайдера'))
            ->add('forLanding', new ImageFormType(), array('label' => 'Изображение для лэндинга', 'required' => false));
    }
} 