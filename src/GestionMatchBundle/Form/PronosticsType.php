<?php

namespace GestionMatchBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PronosticsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('coteequipea')->add('cotex')->add('coteequipeb')
            ->add('idUser',EntityType::class,
                array(
                    'class'=>'MyApp\UserBundle\Entity\User','choice_label'=>'id'))
             ->add('idMatch',EntityType::class,
        array(
            'class'=>'GestionMatchBundle\Entity\Matches','choice_label'=>'idMatch'))
            ->add('Ajouter Pronos',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionMatchBundle\Entity\Pronostics'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionmatchbundle_pronostics';
    }


}
