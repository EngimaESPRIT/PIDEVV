<?php

namespace GestionCommoditeBundle\Form;

use Doctrine\DBAL\Types\ArrayType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;

class CommoditeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categorie', ChoiceType::class, array('label' => 'categorie', 'choices' => array(
                'Hebergements' => 'Hebergements',
                'Restaurants' => 'Rstaurants',
                'Cafes' => 'Cafes',
            )))
            ->add('nomCommodite')
            ->add('email', EmailType::class)
            ->add('tel')
            ->add('carteCredit', ChoiceType::class, array(
                'choices' => array('yes' => true, 'no' => false),
            ))
            ->add('alcool', ChoiceType::class, array(
                'choices' => array('yes' => true, 'no' => false),
            ))
            ->add('ticketRestaurant', ChoiceType::class, array(
                'choices' => array('yes' => true, 'no' => false),
            ))
            ->add('wifi_gratuit', ChoiceType::class, array(
                'choices' => array('yes' => true, 'no' => false),
            ))
            ->add('description',TextareaType::class)
            ->add('adresse')
            ->add('ville', ChoiceType::class, array(
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
                )))
            ->add('lng', HiddenType::class, array(

            ))
            ->add('lat', HiddenType::class, array(

            ))
            ->add('Ajouter', SubmitType::class);
    }

    /**
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
