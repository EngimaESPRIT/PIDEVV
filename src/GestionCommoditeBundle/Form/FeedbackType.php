<?php

namespace GestionCommoditeBundle\Form;

use blackknight467\StarRatingBundle\Form\RatingType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;

class FeedbackType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('contenu',TextareaType::class)

            ->add('rateAcceuil', RatingType::class, ['label' => 'Accueil'])
            ->add('rateCuisine', RatingType::class, ['label' => 'Cuisine'])
            ->add('rateAmbiance', RatingType::class, ['label' => 'Ambiance'])
            ->add('rateRqp', RatingType::class, ['label' => 'Qualite/Prix'])

            ->add('Publier',SubmitType::class);


    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionCommoditeBundle\Entity\Feedback'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestioncommoditebundle_feedback';
    }
}
