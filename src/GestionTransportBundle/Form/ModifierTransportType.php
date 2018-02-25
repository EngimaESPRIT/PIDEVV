<?php

namespace GestionTransportBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModifierTransportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('numero')
            ->add('type',ChoiceType::class,array('label'=>'Type','choices'=>array(
                ''=>'','Train'=>'Train','Bus'=>'Bus')))
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
                    'min' => 1)))
            ->add('Modifier Transport',SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'gestion_transport_bundle_modifier_transport_type';
    }
}
