<?php

namespace GestionTransportBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder

            ->add('numero',TextType::class,array('label'=>'Numero', 'attr' => array('placeholder' => 'Numéro moyen transport')))
            ->add('type',ChoiceType::class,array('label'=>'Type','choices'=>array(
                ''=>'','Train'=>'Train','Bus'=>'Bus')))
           // ->add('station',ChoiceType::class,array('label'=>'Station','choices'=>array(

            ->add('station', ChoiceType::class, array('label' => 'Station', 'choices' => array(

                ''=>'',
                'Ekaterinburg' => 'Ekaterinburg',
                'Kaliningrad' => 'Kaliningrad',
                'Kazan' => 'Kazan',
                'Moscow' => 'Moscow',
                'Nizhniy Novgorod' => 'Nizhniy Novgorod',
                'Rostov on Don' => 'Rostov on Don',
                'Saint Petersburg' => 'Saint Petersburg',
                'Samara' => 'Samara',
                'Saransk' => 'Saransk',
                'Sochi'=>'Sochi',
                'Volgograd'=>'Volgograd'

            )))
            ->add('capacite',IntegerType::class, array(
                'attr' => array(
                    'min' => 1,

                        'placeholder' => 'Capacité')))
            ->add('Ajouter transport',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'gestion_transport_bundle_transport_type';
    }
}
