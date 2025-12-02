<?php

namespace App\Form;

use App\Entity\Artist;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de l\'artiste',
                'required' => true,
            ])
            ->add('imageFile', FileType::class, [
                'label' => 'Image de l\'artiste (JPEG, PNG, GIF)',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'accept' => 'image/*'
                ]
            ])
            ->add('description', TextType::class, [
                'label' => 'Description',
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artist::class,
            'csrf_protection' => false,
        ]);
    }
}
