<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class PersonnageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('date_naissance', BirthdayType::class,[
                'placeholder' => [
                    'day' => 'Jour', 'month' => 'Mois', 'year' => 'Année',
                ],
                'format' => 'd M y'
            ])
            ->add('description')
            ->add('niveau', IntegerType::class, [
                'attr' => [
                'min' => 1,
                ],
            ])
            ->add('experience', IntegerType::class, [
                'attr' => [
                'min' => 0,
                ],
            ])
            ->add('barre_vie', IntegerType::class, [
                'attr' => [
                'min' => 1,
                ],
            ])
            ->add('type_personnage')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
