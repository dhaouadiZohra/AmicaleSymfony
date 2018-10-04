<?php

namespace AmicaleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ReservationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('resIntitule')
            ->add('resLieu')
            ->add('resDescription',TextareaType::class)
            ->add('resNbrPersonnes')
            ->add('resOfrId', EntityType::class, array(
                // query choices from this entity
                'class' => 'AmicaleBundle:Offre',

                // use the User.username property as the visible option string
                'choice_label' => 'ofrIntitule',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ))
            /* ->add('resOfrId')*/
            ->add('Valider',SubmitType::class)
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AmicaleBundle\Entity\Reservation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'amicalebundle_reservation';
    }


}
