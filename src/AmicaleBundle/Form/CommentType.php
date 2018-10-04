<?php
/**
 * Created by PhpStorm.
 * User: oussa
 * Date: 4/10/2017
 * Time: 3:38 AM
 */

namespace AmicaleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contenu',TextareaType::class)
            ->add('commenter',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'amicalebundle_commentaire_type';
    }
}