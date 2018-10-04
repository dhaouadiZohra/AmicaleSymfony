<?php

namespace AmicaleBundle\Form;

use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class personneType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',TextType::class)
            ->add('Agence',TextType::class)
            ->add('Lieux',TextType::class)
            ->add('Prix',MoneyType::class)
            ->add('abnDescription',TextType::class)
            ->add('abnNbrPlaces',IntegerType::class)
            ->add('type',TextType::class)
            ->add('DateDeb', DateType::class, array(
                'widget' => 'single_text'))
            ->add('DateFin', DateType::class, array(
                'widget' => 'single_text'))
            ->add('submit',SubmitType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AmicaleBundle\Entity\Abonnement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'amicalebundle_abonnement';
    }
}
