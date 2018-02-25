<?php

namespace GestionShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder ->add('Nom')
           ->add('Couleur')
           ->add('Prix',NumberType::class)
           ->add('Categorie', ChoiceType::class, array(
               'choices' => array(
                   'Maillot' => "Maillot",
                   'Chaussures' => "Chaussures",
                   'Accessoires' => "Accessoires"
               )
           ))
           ->add('Quantite', IntegerType::class)
           ->add('Composition')
           ->add('Marque',ChoiceType::class, array(
               'choices'  => array(
                   'Nike' => "Nike",
                   'Adidas' => "Adidas",
                   'Puma' => "Puma",
                   'New Balance' => "New Balance",
                   'Umbro' => "Umbro",
                   'Hummel' => "Hummel",
                   'Erreà' => "Erreà",
                   'Uhlsport' => "Uhlsport"
           )))
           ->add('Description', TextareaType::class)
           ->add('File',FileType::class)
       ->add('Ajouter',SubmitType::class);
           }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'gestion_shop_bundle_produits_type';
    }
}
