<?php

namespace AmicaleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
class ActiviteChariteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('actIntitule')
            ->add('actLieu')
            ->add('actDescription')

            ->add('actDateDeb', DateType::class, array(
                'widget' => 'single_text'))
            ->add('actDateFin', DateType::class, array(
                'widget' => 'single_text'))

            ->add('actHeureDeb',TimeType::class, array(
                'input'  => 'datetime',
                'widget' => 'choice',))
            ->add('actHeureFin',TimeType::class, array(
                'input'  => 'datetime',
                'widget' => 'choice',))
            ->add('actChMontant')
            ->add('Valider',SubmitType::class);
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AmicaleBundle\Entity\Activite'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'amicalebundle_activite';
    }


}
