<?php

namespace App\Form;

use App\Entity\Deal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class DealType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class)
            ->add('description', TextType::class)
            ->add('prix_initial', TextType::class)
            ->add('prix_reduit', TextType::class)
            ->add('date_publication', DateType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('lien', TextType::class)
            ->add('imageFilename', FileType::class, [
                'label' => 'Image (JPEG, PNG file, Webp)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '10024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/webp'
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image file (JPEG, PNG, or Webp)',
                    ])
                ],
            ])
            ->add('livraison', ChoiceType::class, [
                'choices' => [
                    'Livraison gratuite' => 'gratuite',
                    'Livraison payante' => 'payante',
                ],
                'placeholder' => 'Choisissez une option de livraison',
                'attr' => ['class' => 'form-select'] // Ajout de la classe Bootstrap form-select
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Deal::class,
        ]);
    }
}
