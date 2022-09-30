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
                'Bronzé' => 'tanned',
                'Asiatique' => 'yellow',
                'Pale' => 'pale',
                'Clair' => 'light',
                'Marron' => 'brown',
                'Marron Foncé' => 'darkBrown',
                'Noir' => 'black',
                ],
            ])
            ->add('top', ChoiceType::class, 
            ['choices' => [
                'Frisé' => 'frizzle',
                'Shag Mullet' => 'shaggyMullet',
                'Shag' => 'shaggy',
                'Court Bouclé' => 'shortCurly',
                'Court Plat' => 'shortFlat',
                'Court' => 'shortRound',
                'Moine' => 'sides',
                'Court et Mèches' => 'shortWaved',
                'Rasé sur le coté 1' => 'theCaesarAndSidePart',
                'Rasé sur le coté 2' => 'theCaesar',
                'Volumineux' => 'bigHair',
                'Coupe bob' => 'bob',
                'Chignon' => 'bun',
                'Bouclé' => 'curly',
                'Ondulé' => 'curvy',
                'Dreadlocks' => 'dreads',
                'Dreadlocks Court 1' => 'dreads01',
                'Dreadlocks Court 2' => 'dreads02',
                'Coupe Frida Khalo' => 'frida',
                'Crépus et bandana' => 'froAndBand',
                'Crépus' => 'fro',
                'Mi-Long' => 'longButNotTooLong',
                'Coupe Mia Wallace' => 'miaWallace',
                'Long et Frange volante' => 'shavedSides',
                'Long et Frange' => 'straightAndStrand',
                'Long 1' => 'straight01',
                'Long 2' => 'straight02',
                'Cache yeux' => 'eyepatch',
                'Turban' => 'turban',
                'Hidjab' => 'hijab',
                'Chapeau' => 'hat',
                "Bonnet d'hiver 1" => 'winterHat01',
                "Bonnet d'hiver 2" => 'winterHat02',
                'Bonnet de Noêl' => 'winterHat03',
                'Bonnet avec oreille' => 'winterHat04',
                ],
            ])
            ->add('haircolor', ChoiceType::class, 
            ['choices' => [
                'Auburn' => 'auburn',
                'Noir' => 'black',
                'Blond' => 'blondeGolden',
                'Blond Foncé' => 'blonde',
                'Brun' => 'brown',
                'Brun Foncé' => 'brownDark',
                'Rose Pale' => 'pastelPink',
                'Blond Platine' => 'platinum',
                'Roux' => 'red',
                'Blanc' => 'silverGray',
                ],
            ])
            ->add('hatcolor', ChoiceType::class, 
            ['choices' => [
                'Noir' => 'black',
                'Bleu Clair' => 'blue01',
                'Bleu 2' => 'blue02',
                'Bleu Foncé' => 'blue03',
                'Gris Clair' => 'gray01',
                'Gris Foncé' => 'gray02',
                'Bleu/Gris' => 'heather',
                'Bleu Pale' => 'pastelBlue',
                'Vert Pale' => 'pastelGreen',
                'Orange Pale' => 'pastelOrange',
                'Rouge Pale' => 'pastelRed',
                'Jaune Pale' => 'pastelYellow',
                'Rose' => 'pink',
                'Rouge' => 'red',
                'Blanc' => 'white',
                ],
            ])
            ->add('accessories', ChoiceType::class, 
            ['choices' => [
                'Rien' => 'none',
                'Lunette Star' => 'kurt',
                'Lunette de vue 1' => 'prescription01',
                'Lunette de vue 2' => 'prescription02',
                'Lunette ronde' => 'round',
                'Lunette de Soleil' => 'sunglasses',
                'Lunette malvoyant' => 'wayfarers',
                ],
            ])
            ->add('accessories_color', ChoiceType::class, 
            ['choices' => [
                'Noir' => 'black',
                'Bleu Clair' => 'blue01',
                'Bleu 2' => 'blue02',
                'Bleu Foncé' => 'blue03',
                'Gris Clair' => 'gray01',
                'Gris Foncé' => 'gray02',
                'Bleu/Gris' => 'heather',
                'Bleu Pale' => 'pastelBlue',
                'Vert Pale' => 'pastelGreen',
                'Orange Pale' => 'pastelOrange',
                'Rouge Pale' => 'pastelRed',
                'Jaune Pale' => 'pastelYellow',
                'Rose' => 'pink',
                'Rouge' => 'red',
                'Blanc' => 'white',
                ],
            ])
            ->add('facialhair', ChoiceType::class, 
            ['choices' => [
                'Rien' => 'none',
                'Barbe' => 'beardMedium',
                'Barbe Courte' => 'beardLight',
                'Barbe Père Noël' => 'beardMagestic',
                'Moustache 1' => 'moustaceFancy',
                'Moustache 2' => 'moustacheMagnum',
                ],
            ])
            ->add('facialhaircolor', ChoiceType::class, 
            ['choices' => [
                'Auburn' => 'auburn',
                'Noir' => 'black',
                'Blond' => 'blondeGolden',
                'Blond Foncé' => 'blonde',
                'Brun' => 'brown',
                'Brun Foncé' => 'brownDark',
                'Rose Pale' => 'pastelPink',
                'Blond Platine' => 'platinum',
                'Roux' => 'red',
                'Blanc' => 'silverGray',
                ],
            ])
            ->add('clothing', ChoiceType::class, 
            ['choices' => [
                'Blazer' => 'blazerAndShirt',
                'Blazer et pull' => 'blazerAndSweater',
                'Chemise et pull' => 'collarAndSweater',
                'Sweet' => 'hoodie',
                'Salopette' => 'overall',
                'Pull' => 'shirtCrewNeck',
                'T-shirt' => 'shirtScoopNeck',
                'T-shirt et crâne' => 'graphicShirt',
                'T-shirt col V' => 'shirtVNeck',
                ],
            ])
            ->add('clothingcolor', ChoiceType::class, 
            ['choices' => [
                'Noir' => 'black',
                'Bleu Clair' => 'blue01',
                'Bleu 2' => 'blue02',
                'Bleu Foncé' => 'blue03',
                'Gris Clair' => 'gray01',
                'Gris Foncé' => 'gray02',
                'Bleu/Gris' => 'heather',
                'Bleu Pale' => 'pastelBlue',
                'Vert Pale' => 'pastelGreen',
                'Orange Pale' => 'pastelOrange',
                'Rouge Pale' => 'pastelRed',
                'Jaune Pale' => 'pastelYellow',
                'Rose' => 'pink',
                'Rouge' => 'red',
                'Blanc' => 'white',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
