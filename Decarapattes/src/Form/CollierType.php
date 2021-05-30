<?php

namespace App\Form;

use App\Entity\Collier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ColorType;

class CollierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference')
            ->add('description')
            ->add('prix')
            ->add('quantite')
            ->add('tailleCollier')
            ->add('couleurCollier', ColorType::class)
            ->add('uneoption')
            ->add('unebouclerie')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Collier::class,
        ]);
    }
}
