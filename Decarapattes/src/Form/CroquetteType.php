<?php

namespace App\Form;

use App\Entity\Croquette;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CroquetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference')
            ->add('description')
            ->add('prix')
            ->add('quantite')
            ->add('goutCroquette')
            ->add('tailleCroquette')
            ->add('typeCroquette')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Croquette::class,
        ]);
    }
}
