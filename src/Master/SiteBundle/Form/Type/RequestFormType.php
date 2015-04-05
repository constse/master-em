<?php

namespace Master\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RequestFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array('label' => 'Как Вас зовут?'))
            ->add('phone', 'text', array('label' => 'Телефон для связи'))
            ->add('email', 'email', array('label' => 'Адрес электропочты'))
            ->add('from', 'hidden', array('attr' => array('class' => 'hidden-from')))
            ->add('query', 'hidden', array('attr' => array('class' => 'hidden-query')))
            ->add('submit', 'submit', array('label' => 'Отправить'));
    }

    public function getName()
    {
        return 'request';
    }
} 