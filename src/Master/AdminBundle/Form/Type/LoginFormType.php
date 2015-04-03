<?php

namespace Master\AdminBundle\Form\Type;

use Master\SystemBundle\Form\Type\AbstractEntityFormType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginFormType extends AbstractEntityFormType
{
    public function __construct()
    {
        parent::__construct('login', 'User');
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'text', array('label' => 'Имя пользователя'))
            ->add('password', 'password', array('label' => 'Пароль'))
            ->add('rememberme', 'hidden', array('data' => true, 'mapped' => false));
    }
} 