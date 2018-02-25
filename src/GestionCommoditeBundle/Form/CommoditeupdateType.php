<?php

namespace GestionCommoditeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommoditeupdateType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categorie',ChoiceType::class,array('label'=>'categorie','choices'=>array(
                'Hebergements'=>'Hebergements',
                'Rstaurants'=>'Rstaurants',
                'Cafes'=>'Cafes',
            )))
            ->add('nomCommodite')
            ->add('email',EmailType::class)
            ->add('tel')
            ->add('carteCredit',ChoiceType::class,array(
                'choices' => array('yes' => true, 'no' => false),
            ))

            ->add('alcool',ChoiceType::class,array(
                'choices' => array('yes' => true, 'no' => false),
            ))
            ->add('ticketRestaurant',ChoiceType::class,array(
                'choices' => array('yes' => true, 'no' => false),
            ))
            ->add('wifi_gratuit' ,ChoiceType::class,array(
                'choices' => array('yes' => true, 'no' => false),
            ))
            ->add('description')

            ->add('adresse')
            ->add('ville',ChoiceType::class,array(
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
                    'Sochi'=>'Sochi',
                    'Volgograd'=>'Volgograd'
                )))
            ->add('lng', HiddenType::class, array(

            ))
            ->add('lat', HiddenType::class, array(

            ))
            ->add('Modifier',SubmitType::class);
    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionCommoditeBundle\Entity\Commodite'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestioncommoditebundle_commodite';
    }


}
