<?php

namespace App\Form;

use App\Entity\Entreprise;
use App\Entity\Offre;
use App\Entity\Referent;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numero')
            ->add('titre')
            ->add('lieu_travail')
            ->add('description')
            ->add('diffusion')
            ->add('salaire')
            ->add('lien_offre')
            ->add('entreprise', EntityType::class, [
                'class' => Entreprise::class,
'choice_label' => 'id',
            ])
            ->add('referent', EntityType::class, [
                'class' => Referent::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
