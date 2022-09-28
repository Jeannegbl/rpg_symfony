<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AvatarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('skin', ChoiceType::class, 
            ['choices' => [
                'tanned',
                'yellow',
                'pale',
                'light',
                'brown',
                'darkBrown',
                'black',
                ],
            ])
            ->add('top')
            ->add('haircolor')
            ->add('hatcolor')
            ->add('accessories')
            ->add('accessories_color')
            ->add('facialhair')
            ->add('facialhaircolor')
            ->add('clothing')
            ->add('clothingcolor')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
