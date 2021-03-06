<?php

namespace GestionCommoditeBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommoditefavoriteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('idUser')
            ->add('idCommodite',EntityType::class,
                array(
                    'class'=>'GestionCommoditeBundle\Entity\Commodite',
                    'choice_label'=>'idCommodite'))
            ->add('ajouter',SubmitType::class)
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionCommoditeBundle\Entity\Commoditefavorite'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestioncommoditebundle_commoditefavorite';
    }


}
