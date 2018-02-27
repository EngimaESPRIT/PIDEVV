<?php

namespace GestionTransportBundle\Form;

use Gregwar\CaptchaBundle\Type\CaptchaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlimenterSoldeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('soldes', TextType::class, array(
                'attr' => array(
                    'min' => 1,
                    'placeholder' => 'Tapez le Voucher'),'label'=>'Voucher'))
            ->add('captcha', CaptchaType::class,array('font'=>'Consolas','as_url'=>true,'reload'=>true,'quality'=>1000,'length'=>4,'invalid_message'=>'Veuillez verifier la Captcha'))
            ->add('Valider',SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'gestion_transport_bundle_alimenter_solde_type';
    }
}
