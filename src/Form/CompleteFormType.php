<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CompleteFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_entreprise', TextType::class, [
                'label' => 'Nom de l\'entreprise*'
            ])
            ->add('lien_entreprise', UrlType::class, [
                'label' => 'Lien de l\'entreprise',
                'required' => false
            ])
            ->add('siret', TextType::class, [
                'label' => 'Numéro SIRET',
                'required' => false
            ])
            ->add('numero', TextType::class, [
                'label' => 'N° de l\'offre',
                'required' => false
            ])
            ->add('titre', TextType::class, [
                'label' => 'Titre de l\'annonce*'
            ])
            ->add('lieu_travail', TextType::class, [
                'label' => 'Lieu de travail*'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description du poste*'
            ])
            ->add('diffusion', TextType::class, [
                'label' => 'Où avez-vous trouvé cette annonce ?',
                'required' => false
            ])
            ->add('salaire', TextType::class, [
                'label' => 'Salaire*'
            ])
            ->add('lien_offre', UrlType::class, [
                'label' => 'Lien de l\'offre',
                'required' => false
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'required' => false
            ])
            ->add('nom', TextType::class, [
                'label' => 'Nom*'
            ])
            ->add('poste', TextType::class, [
                'label' => 'Quel est son poste ?',
                'required' => false
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => false
            ])
            ->add('telephone', TextType::class, [
                'label' => 'Téléphone',
                'required' => false
            ])
            ->add('linkdin', UrlType::class, [
                'label' => 'Profil LinkedIn',
                'required' => false
            ])
            ->add('date_candidature', DateType::class, [
                'label' => 'Date de candidature*'
            ])
            ->add('cv', ChoiceType::class, [
                'label' => 'Avez-vous transmis votre CV ?*',
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
            ])
            ->add('lettre_motivation', ChoiceType::class, [
                'label' => 'Avez-vous transmis votre lettre de motivation*',
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
            ])
            ->add('date_relance', DateType::class, [
                'label' => 'Date de relance'
            ])
            ->add('entretien', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'label' => 'Entretien'
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'En cours' => 'En cours',
                    'Accepté' => 'Accepté',
                    'Refusé' => 'Refusé',
                ],
                'label' => 'Statut'
            ]);

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
