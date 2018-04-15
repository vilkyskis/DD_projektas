<?php

namespace App\Form;

use App\Entity\Car;
use App\Entity\CarsBrand;
use App\Entity\CarsModel;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('license_plate')
            ->add('veh_id_number')
            ->add('eng_id_number')
            ->add('carsBrand', EntityType::class, array(
                'class' => CarsBrand::class,

                'query_builder' => function (EntityRepository $er) {
                    dump($er->createQueryBuilder('brand')
                        ->orderBy('brand.title', 'ASC')->getQuery()->getArrayResult());
                    return $er->createQueryBuilder('brands')
                        ->orderBy('brands.title', 'ASC');
                },

                'choice_label' => 'title',
                'choice_value' => 'id',
            ))
            ->add('carsModel', EntityType::class, array(
                'class' => CarsModel::class,

                'query_builder' => function (EntityRepository $er) {
                    dump($er->createQueryBuilder('model')
                        ->orderBy('model.title', 'ASC')->getQuery()->getArrayResult());
                    return $er->createQueryBuilder('model')
                        ->orderBy('model.title', 'ASC');
                },

                'choice_label' => 'title',
                'choice_value' => 'id',
            ))
            ->add('user', EntityType::class, array(
                'class' => User::class,

                'choice_label' => function ($user) {
                    dump($user);
                    return $user->__toString();
                },
                'choice_value' => 'id',
            ))
            ->add('save', SubmitType::class, array('label' => 'Create Task'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Car::class,
        ));
    }
}
