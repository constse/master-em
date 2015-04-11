<?php

namespace Master\AdminBundle\Form\Type;

use Master\SystemBundle\Form\Type\AbstractEntityFormType;
use Symfony\Component\Form\FormBuilderInterface;

class QuestionFormType extends AbstractEntityFormType
{
    public function __construct()
    {
        parent::__construct('question', 'Question');
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('caption', 'text', array('label' => 'Заголовок вопроса'))
            ->add('text', 'textarea', array('label' => 'Текст ответа'));
    }
} 