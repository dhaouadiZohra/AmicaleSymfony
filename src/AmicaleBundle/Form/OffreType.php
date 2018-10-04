<?php

namespace AmicaleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
class OffreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ofrIntitule')
            ->add('ofrNbrPlaces')
            ->add('ofrDateDeb', DateType::class, array(
                 'widget' => 'single_text'))
            ->add('ofrDateFin', DateType::class, array(
                'widget' => 'single_text'))
            ->add('ofrDescription')
            ->add('ofrAgence')
            ->add('ofrHeureDeb',TimeType::class, array(
                  'input'  => 'datetime',
                  'widget' => 'choice',))
            ->add('ofrHeureFin',TimeType::class, array(
                'input'  => 'datetime',
                'widget' => 'choice',))
            ->add('Valider',SubmitType::class);
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AmicaleBundle\Entity\Offre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'amicalebundle_offre';
    }


}
