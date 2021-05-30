<?php

namespace App\Form;

use App\Entity\Laisse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ColorType;

class LaisseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference')
            ->add('description')
            ->add('prix')
            ->add('quantite')
            ->add('tailleLaisse')
            ->add('couleurLaisse', ColorType::class )
            ->add('uneoption')
            ->add('unebouclerie')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Laisse::class,
        ]);
    }
}
