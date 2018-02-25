<?php

namespace GestionTransportBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;

class UserModifierDemandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id_vehicule',EntityType::class, array('class' => "GestionTransportBundle\Entity\Vehicules", "multiple" => false, 'attr' => ['class' => 'hideme'],'label'=>'Vehicule', 'choice_label' => 'immatriculation'))


            ->add('date_match', DateType::class,array('widget'=>'single_text'))
            ->add('heure_depart', TimeType::class)
        //    ->add('heure_arrive', TimeType::class)
            ->add('point_depart', ChoiceType::class, array('label' => 'Point depart', 'choices' => array(

                '' => '',
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

            )))
            ->add('point_arrive', ChoiceType::class, array('label' => 'Point arrive', 'choices' => array(
                '' => '',
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

            )))
            //->add('distance', NumberType::class, array('attr' => array('min' => 0, 'max' => 5)))
            ->add('Prix',IntegerType::class, array(
                'attr' => array(
                    'min' => 1)))
           /* ->add('devise', ChoiceType::class, array('label' => 'Devise', 'choices' => array(
                'EUR' => 'EUR',
                'USD' => 'USD',
                'TND' => 'TND',
                'RUB' => 'RUB',
                'LYR' => 'LYR',


            )))*/
            ->add('Modifier Offre', SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'gestion_transport_bundle_user_modifier_demande_type';
    }
}
