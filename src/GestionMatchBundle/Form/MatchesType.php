<?php

namespace GestionMatchBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MatchesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('phase')->add('dateMatch',DateType::class)->add('lieuMatch')->add('resultat')->add('butequipe1',NumberType::class)->add('butesuipe2',NumberType::class)
            ->add('equipea',EntityType::class,
                array(
                    'class'=>'GestionEJBundle\Entity\Equipe','choice_label'=>'nom'))
            ->add('equipeb',EntityType::class,
                array(
                    'class'=>'GestionEJBundle\Entity\Equipe','choice_label'=>'nom'))

            ->add('idGroupe',EntityType::class,
                array('class'=>'GestionMatchBundle\Entity\Groupe','choice_label'=>'nomGroupe'))

            ->add('idStade',EntityType::class,
                array(
                    'class'=>'GestionEJBundle\Entity\Stade','choice_label'=>'nom'))
            ->add('Ajouter Match',SubmitType::class);
    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionMatchBundle\Entity\Matches'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionmatchbundle_matches';
    }


}
