<?php

namespace GestionCommoditeBundle\Form;

use GestionCommoditeBundle\Entity\GalerieCommodite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GalerieCommoditeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('name',FileType::class,array('label'=>'Image(Image C)'))
            ->add('name', FileType::class, array(
                'attr' => array(
                    'accept' => 'image/*',
                    'multiple' => 'multiple'
                )

            ))
            ->add('idCommodite',EntityType::class,
               array(
                 'class'=>'GestionCommoditeBundle\Entity\Commodite',
                 'choice_label'=>'nomCommodite'))
            ->add('ajouter', SubmitType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => GalerieCommodite::class,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestioncommoditebundle_galeriecommodite';
    }


}
