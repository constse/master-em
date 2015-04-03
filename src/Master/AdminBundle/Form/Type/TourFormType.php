<?php

namespace Master\AdminBundle\Form\Type;

use Master\SystemBundle\Entity\Tour;
use Master\SystemBundle\Form\Type\AbstractEntityFormType;
use Symfony\Component\Form\FormBuilderInterface;

class TourFormType extends AbstractEntityFormType
{
    public function __construct()
    {
        parent::__construct('tour', 'Tour');
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('image', new ImageFormType(), array('label' => 'Изображение'))
            ->add('caption', 'text', array('label' => 'Наименование'))
            ->add('from', 'text', array('label' => 'Откуда'))
            ->add('days', 'text', array('label' => 'Продолжительность'))
            ->add('price', 'integer', array('label' => 'Стоимость'))
            ->add('type', 'choice', array('label' => 'Тип',
                'choices' => array(Tour::TYPE_NEW => 'Новый', Tour::TYPE_LATEST => 'Горящий', Tour::TYPE_OFFER => 'Акция'),
            ))->add('location', 'choice', array('label' => 'Расположение',
                'choices' => array(Tour::LOCATION_FOREIGN => 'Зарубежный', Tour::LOCATION_ALTAI => 'Алтай', Tour::LOCATION_RUSSIA => 'Россия'),
            ))->add('landing', 'choice', array('label' => 'Лэндинг',
                'choices' => array(1 => 'Белокуриха', 2 => 'Экстрим', 3 => 'Алтай', 4 => 'Россия', 5 => 'Зарубежный')
            ))->add('template', 'choice', array('label' => 'Шаблон',
                'choices' => array(1 => '1', 2 => '2', 3 => '3'),
                'expanded' => true
            ));
    }
} 