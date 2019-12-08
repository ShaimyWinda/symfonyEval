<?php

namespace App\Form;

use App\Form\Model\ContactModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('firstname', TextType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => 'Le prénom est obligatoire'
                ])
            ]
        ])
        ->add('lastname', TextType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => 'Le nom est obligatoire'
                ])
            ]
        ])
        ->add('email', EmailType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => "L'email est obligatoire"
                ]),
                new Email([
                    'message' => "L'email n'est pas valide"
                ])
            ]
        ])
        ->add('message', TextareaType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => 'Le message est obligatoire'
                ])
            ]
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => ContactModel::class
        ]);
    }
}
