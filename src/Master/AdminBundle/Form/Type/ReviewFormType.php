<?php

namespace Master\AdminBundle\Form\Type;

use Master\SystemBundle\Form\Type\AbstractEntityFormType;
use Symfony\Component\Form\FormBuilderInterface;

class ReviewFormType extends AbstractEntityFormType
{
    public function __construct()
    {
        parent::__construct('review', 'Review');
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array('label' => 'Имя'))
            ->add('image', new ImageFormType(), array('label' => 'Фотография', 'required' => false))
            ->add('to', 'text', array('label' => 'Что делал'))
            ->add('short', 'text', array('label' => 'Краткий отзыв'))
            ->add('full', 'textarea', array('label' => 'Полный отзыв'));
    }
} 