<?php

namespace GestionMatchBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class eventsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'placeholder' => 'Title'
                ]
            ])
            ->add('startdate', DateTimeType::class, [
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
                'attr' => [
                    'placeholder' => 'Start Date'
                ]
            ])
            ->add('enddate', DateTimeType::class, [
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
                'attr' => [
                    'placeholder' => 'End Date'
                ]
            ])
            ->add('nbplaces', IntegerType::class, [
                'attr' => [
                    'placeholder' => 'N° Places'
                ]
            ])
            ->add('price', MoneyType::class, [
                'attr' => [
                    'placeholder' => 'Price'
                ]
            ])

        ;
    }
        /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionMatchBundle\Entity\events',
                'csrf_protection' => false,

        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionmatchbundle_events';
    }


}
