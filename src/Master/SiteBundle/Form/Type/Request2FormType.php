<?php

namespace Master\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Request2FormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array('label' => false))
            ->add('email', 'email', array('label' => false))
            ->add('from', 'hidden', array('attr' => array('class' => 'hidden-from')))
            ->add('query', 'hidden', array('attr' => array('class' => 'hidden-query')))
            ->add('submit', 'submit', array('label' => 'Ура!'));
    }

    public function getName()
    {
        return 'request2';
    }
} 