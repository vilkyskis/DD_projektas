<?php

namespace App\Form;

use App\Entity\Cheque;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChequeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $price = $options['price'];
        $builder
            ->add('date',DateTimeType::class,array(
                'data' => new \DateTime(),
                'years' => range(date('y'), date('y')+1)
            ))
            ->add('paid')
            ->add('amount',HiddenType::class,array(
                'data' => $price,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cheque::class,
            'price' => array(),
        ]);
    }
}
