<?php

namespace App\Form;

use App\Entity\Main;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', null, [
                'label' => 'First name: ',
                'attr' => [
                    'placeholder' => 'Введите first name ...'
                ],
            ])
            ->add('secondname', null, [
                'label' => 'Second name: ',
                'attr' => [
                    'placeholder' => 'Введите second name ...'
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email: ',
                'attr' => [
                    'placeholder' => 'Введите email ...'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Main::class,
        ]);
    }


}
