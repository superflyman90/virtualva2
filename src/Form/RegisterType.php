<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => "Your firstname"
                ]
            ])
            ->add('lastname', TextType::class, [
                'attr' => [
                    'placeholder' => "Your lastname"
                ]
            ])
            ->add('email', EmailType::class, [
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => "Your Email"
                ]
            ])
            ->add('password', RepeatedType::class, [
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
                'type' => PasswordType::class,
                'invalid_message' => "Password and his conform has to be the same",
                'label' => 'Your Password',
                'required' => true,
                'first_options' => ['label' => "Password"],
                'second_options' => ['label' => "Password confirm"]
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary mt-3'
                ],
                'label' => "Signup"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
