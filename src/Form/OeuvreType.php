<?php

namespace App\Form;

use App\Entity\Oeuvre;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OeuvreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('auteur')
            ->add('categorie', EntityType::class, [ //Faire reférence à 
                'class' => Categorie::class,
                'choice_label' => function ( $category) {
                    return $categorie->getNom();
                },
                'label' => 'categorie'
            ])
            ->add('creation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Oeuvre::class,
        ]);
    }
}
