<?php

namespace GestionEJBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButtonTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class AjoutStade extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('ville', ChoiceType::class, array(
            'choices' => array(
                'Ekaterinburg' => 'Ekaterinburg',
                'Kaliningrad' => 'Kaliningrad',
                'Kazan' => 'Kazan',
                'Moscow' => 'Moscow',
                'Nizhniy Novgorod' => 'Nizhniy Novgorod',
                'Rostov on Don' => 'Rostov on Don',
                'Saint Petersburg' => 'Saint Petersburg',
                'Samara' => 'Samara',
                'Saransk' => 'Saransk',
                'Sochi' => 'Sochi',
                'Volgograd' => 'Volgograd'
            )))->add('capacite')->add('photostade',FileType::class,array('data_class' => null))->add('description',TextareaType::class)->add('Toit',ChoiceType::class,array('choices'=>array(
                'oui'=>'oui',
                'non'=>'non',


            )))->add('Surface',ChoiceType::class,array('choices'=>array(
                'Traditionnel'=>'Traditionnel',
                'Placage'=>'Placage',
                'Synthetique'=>'Synthetique'


            )))->add('WIFI',ChoiceType::class,array('choices'=>array(
                'oui'=>'oui',
                'non'=>'non',


            )))->add('Adresse',TextType::class)->add('Ajouter',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionEJBundle\Entity\Stade'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionejbundle_stade';
    }


}
