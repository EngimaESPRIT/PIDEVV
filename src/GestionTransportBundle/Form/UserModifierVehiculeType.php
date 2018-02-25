<?php

namespace GestionTransportBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserModifierVehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //   ->add('iduser',HiddenType::class)
        //    ->add('iduser',TextType::class,array('label'=>'Username'))

      //  ->add('iduser',EntityType::class,array('class'=>"MyApp\UserBundle\Entity\User","multiple"=>false,'attr'=>['class'=>'hideme'],'choice_label'=>"username",'label'=>'Utilisateur'))

        $builder

        ->add('marque',ChoiceType::class,array('label'=>'marque','choices'=>array(
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
            'VOLVO'=>'VOLVO',

        )))

        ->add('immatriculation')


        //  ->add('image_permis')
        ->add('imageCarteGrise', FileType::class, array('label' => 'Carte Grise','data_class'=>null,'empty_data'=>true,'required'=>false))
        ->add('imageVehicule', FileType::class, array('label' => 'Vehicule','data_class'=>null,'empty_data'=>true,'required'=>false))
        ->add('num_assurance',TextType::class,array('label'=>'Numero assurance'))




            ->add('nb_places',IntegerType::class,array('label'=>'Nombre de places',  'attr' => array(
                'min' => 1)))



        ->add('Modifier vehicule',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'gestion_transport_bundle_user_modifier_vehicule_type';
    }
}
