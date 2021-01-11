<?php

namespace App\Form;

use App\Entity\Person;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Lastname', TextType::class, ['label' => 'Nom'])
            ->add('Firstname', TextType::class, ['label' => 'Prénom'])
            ->add('Phone', TextType::class, ['label' => 'Téléphone'])
            ->add('StreetAddress', TextType::class, ['label' => 'Adresse'])
            ->add('City', TextType::class, ['label' => 'Ville'])
            ->add('Zipcode', TextType::class, ['label' => 'Code postal'])
            ->add('Country', TextType::class, ['label' => 'Pays'])
            ->add('Ajouter', SubmitType::class, ['label' => 'Ajouter'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Person::class,
        ]);
    }
}
