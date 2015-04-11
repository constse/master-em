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
            ->add('forLanding', new ImageFormType(), array('label' => 'Изображение для лэндинга', 'required' => false))
            ->add('landH1', 'textarea', array('label' => 'Заголовок лэндинга уровень 1'))
            ->add('landH2', 'textarea', array('label' => 'Заголовок лэндинга уровень 2', 'required' => false))
            ->add('landH3', 'textarea', array('label' => 'Заголовок лэндинга уровень 3', 'required' => false));
    }
} 