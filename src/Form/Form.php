<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Test\FormBuilderInterface as TestFormBuilderInterface;

class UtilisateurType extends AbstractType
{
    public function create(TestFormBuilderInterface $builder, array $option)
    {
        $builder
            -> add('username')
            -> add('password', PasswordType::class)
            ;
    }

    public function configureOption(OptionsResolver $resolver)
    {
        $resolver->setDefault([
            'data_class' => Utilisateur::class,
        ]);
    }
}