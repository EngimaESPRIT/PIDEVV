<?php

namespace GestionTransportBundle\Form;

use Doctrine\ORM\EntityRepository;
use GestionTransportBundle\Entity\Vehicules;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class UserVehiculesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder

            ->add('marque',ChoiceType::class,array('label'=>'Marque','choices'=>array(

                'ALFA ROMEO'=>'ALFAROMEO',
                'ALPINE'=>'ALPINE',
                'ASTON MARTIN'=>'ASTONMARTIN',
                'AUDI'=>'AUDI',
                'BENTLEY'=>'BENTLEY',
                'BMW'=>'BMW',
                'BUGATTI'=>'BUGATTI',
                'CADILLAC'=>'CADILLAC',
                'CHEVROLET'=>'CHEVROLET',
                'CHRYSLER'=>'CHRYSLER',
                'CITROEN'=>'CITROEN',
                'FERRARI'=>'FERRARI',
                'FIAT'=>'FIAT',
                'FORD'=>'FORD',
                'FORDMUSTANG'=>'FORDMUSTANG',
                'FORD USA'=>'FORDUSA',
                'HONDA'=>'HONDA',
                'HYUNDAI'=>'HYUNDAI',
                'INFINITI'=>'INFINITI',
                'JAGUAR'=>'JAGUAR',
                'JEEP'=>'JEEP',
                'LAMBORGHINI'=>'LAMBORGHINI',
                'LANCIA'=>'LANCIA',
                'LAND ROVER'=>'LANDROVER',
                'LEXUS'=>'LEXUS',
                'LOTUS'=>'LOTUS',
                'MASERATI'=>'MASERATI',
                'MAZDA'=>'MAZDA',
                'MCLAREN'=>'MCLAREN',
                'MERCEDES'=>'MERCEDES',
                'MINI'=>'MINI',
                'MITSUBISHI'=>'MITSUBISHI',
                'MORGAN'=>'MORGAN',
                'NISSAN'=>'NISSAN',
                'OPEL'=>'OPEL',
                'PEUGEOT'=>'PEUGEOT',
                'PORSCHE'=>'PORSCHE',
                'RENAULT'=>'RENAULT',
                'ROLLS-ROYCE'=>'ROLLS-ROYCE',
                'SEAT'=>'SEAT',
                'SUBARU'=>'SUBARU',
                'SUZUKI'=>'SUZUKI',
                'TESLA'=>'TESLA',
                'TOYOTA'=>'TOYOTA',
                'VOLKSWAGEN'=>'VOLKSWAGEN',
                'VOLVO'=>'VOLVO'

            ), 'placeholder' => 'Choisir une marque'))

            ->add('immatriculation',null, array('attr' => array(
        'placeholder' => 'Numéro de plaque immatriculation')))


            ->add('imageCarteGrise', FileType::class, array('label' => 'Carte Grise'))

            ->add('imageVehicule', FileType::class, array('label' => 'Vehicule'))
            ->add('num_assurance',TextType::class,array('label'=>'Numero assurance','attr' => array(
                'placeholder' => 'Numéro assurance')))
            //  ->add('etat')
            ->add('nb_places',IntegerType::class,array('label'=>'Nombre de places',  'attr' => array(
                'min' => 1,
                    'placeholder' => 'Nombre de places')))
            ->add('Ajouter vehicule',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Vehicules::class,
        ));

    }

    public function getBlockPrefix()
    {
        return 'gestion_transport_bundle_vehicules_type';
    }
}
