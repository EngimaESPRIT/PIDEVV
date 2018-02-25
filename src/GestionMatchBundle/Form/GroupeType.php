<?php

namespace GestionMatchBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class GroupeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('pointsA')->add('pointsB')->add('pointsC')->add('pointsD')->add('nbrButa')->add('nbrButb')->add('nbrButc')->add('nbrButd')->add('wA')->add('wB')->add('wC')->add('wD')->add('dA')->add('dB')->add('dC')->add('dD')->add('lA')->add('lB')->add('lC')->add('lD')
            ->add('equipea',EntityType::class,
            array(
                'class'=>'GestionEJBundle\Entity\Equipe', 'choice_label'=>'nom'))
            ->add('equipeb',EntityType::class,
                array(
                    'class'=>'GestionEJBundle\Entity\Equipe','choice_label'=>'nom'))
            ->add('equipec',EntityType::class,
                array(
                    'class'=>'GestionEJBundle\Entity\Equipe','choice_label'=>'nom'))
            ->add('equiped',EntityType::class,
                array(
                    'class'=>'GestionEJBundle\Entity\Equipe', 'choice_label'=>'nom'));
    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionMatchBundle\Entity\Groupe'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionmatchbundle_groupe';
    }


}
