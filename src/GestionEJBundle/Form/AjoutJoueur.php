<?php

namespace GestionEJBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjoutJoueur extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('prenom')->add('numero',IntegerType::class,array('attr'=>array('min'=>0)))->add('datedenaissance',DateType::class)->add('lieunaissance')->add('taille',IntegerType::class,array('attr'=>array('min'=>0)))->add('poids',IntegerType::class,array('attr'=>array('min'=>0)))->add('nationalite')->add('poste1',ChoiceType::class,array('choices'=>array(
            'Gardien'=>'GK',
            'Defenseur Central'=>'DC',
            'Defenseur Gauche'=>'DG',
            'Defenseur Droit'=>'DD',
            'Milieu Defensif'=>'MDE',
            'Milieu Central'=>'MC',
            'Milieu Droit'=>'MD',
            'Milieu Gauche'=>'MG',
            'Attaquant'=>'ATT',

        )))->add('cout',IntegerType::class,array('attr'=>array('min'=>0)))->add('buts',IntegerType::class,array('attr'=>array('min'=>0)))->add('selections',IntegerType::class,array('attr'=>array('min'=>0)))->add('idEquipe',EntityType::class,
            array(
            'class'=>'GestionEJBundle\Entity\Equipe',
            'choice_label'=>'nom','label'=>'Equipe'))->add('participations')->add('pied',ChoiceType::class,array('choices'=>array(
                'Droitier'=>'D',
            'Gauchier'=>'G',
            'les deux'=>'DG',

        )))->add('imagejoueur1',FileType::class, array(
            'data_class' => null))->add('imagejoueur2',FileType::class, array(
            'data_class' => null))->add('imagejoueur3',FileType::class, array(
            'data_class' => null))->add('butsmarque',IntegerType::class,array('attr'=>array('min'=>0)))->add('Ajouter',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionEJBundle\Entity\Joueur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionejbundle_joueur';
    }


}
