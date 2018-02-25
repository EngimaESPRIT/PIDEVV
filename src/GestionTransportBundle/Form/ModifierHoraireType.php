<?php

namespace GestionTransportBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModifierHoraireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('id_transport',EntityType::class,array('class'=>"GestionTransportBundle\Entity\Transport","multiple"=>false,'attr'=>['class'=>'hideme'],'choice_label'=>"numero",'label'=>'Numero'))
            ->add('date_match',DateType::class,array('widget'=>'single_text'))
            ->add('heure_depart',TimeType::class)



            ->add('point_arrive', ChoiceType::class, array('label' => 'Point arrive', 'choices' => array(
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


      //      ->add('distance')
            ->add('Prix',IntegerType::class, array(
          'attr' => array(
              'min' => 1)))
        /*    ->add('devise',ChoiceType::class,array('label' => 'Devise', 'choices' => array(
                'EUR'=>'EUR',
                'USD'=>'USD',
                'TND'=>'TND',
                'RUB'=>'RUB',
                'LYR'=>'LYR',


            )))*/
            ->add('Modifier horaire',SubmitType::class);


    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'gestion_transport_bundle_modifier_horaire_type';
    }
}
