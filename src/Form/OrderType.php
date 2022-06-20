<?php

namespace App\Form;

use App\Entity\Order;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'price',
                TextType::class,
                [
                    'attr' => ['placeholder' => 'Votre prix ']
                ]
            )
            ->add(
                'date_start',
                DateType::class,
                [
                    'widget' => 'single_text'
                ]
            )
            ->add(
                'date_end',
                DateType::class,
                [
                    'widget' => 'single_text'
                ]
            )
            ->add('product')
            ->add('save', SubmitType::class, [
                'label' => 'Valider',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
        ]);
    }
}
