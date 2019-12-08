<?php

namespace App\Form;

use App\Entity\Oeuvres;
use App\Entity\Categories;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class OeuvresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le nom est obligatoire'
                    ])
                ]
            ])
            ->add('description', TextareaType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'La description est obligatoire'
                    ])
                ]
            ])
            ->add('categories',IntegerType::class, [
                'constraints' => [
                    new Count([
                        'min' => 1,
                        'max' => 3,
                        'minMessage' => "Vous devez sélectionner une catégorie au minimum"
                    ])
                ]
            ])
            ->add('image', FileType::class, [
                'data_class' => null,
                'constraints' => [
                    new NotBlank([
                        'message' => 'ajouter une image est fortement conseillé'
                    ]),
                    new Image([
                        'mimeTypesMessage' => "Vous devez sélectionner une image",
                        'mimeTypes' => ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml', 'image/webp']
                    ])
                ]
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Oeuvres::class,
        ]);
    }
}
