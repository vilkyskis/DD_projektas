<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            /*->add('usernameCanonical',HiddenType::class)*/
            ->add('email')
            /*->add('emailCanonical',HiddenType::class)
            ->add('enabled',HiddenType::class)
            ->add('salt',HiddenType::class)
            ->add('password',HiddenType::class)
            ->add('lastLogin',HiddenType::class)
            ->add('confirmationToken',HiddenType::class)
            ->add('passwordRequestedAt',HiddenType::class)
            ->add('roles',HiddenType::class)*/
            ->add('phone')
            /*->add('visits',HiddenType::class)*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
