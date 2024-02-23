<?php

namespace App\Form;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;

class CompleteFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_entreprise', TextType::class, [
                'label' => 'Nom de l\'entreprise*',
                // 'data' => 'Nom de Test Entreprise'
            ])
            ->add('lien_entreprise', UrlType::class, [
                'label' => 'Lien de l\'entreprise',
                'required' => false,
                // 'data' => 'https://www.example.com'
            ])
            ->add('adresse', TextareaType::class, [
                'label' => 'Adresse de l\'entreprise',
                'required' => false
            ])
            ->add('siret', TextType::class, [
                'label' => 'Numéro SIRET',
                'required' => false,
                // 'data' => '12345678900001'
            ])
            ->add('numero', TextType::class, [
                'label' => 'N° de l\'offre',
                'required' => false,
                // 'data' => '123'
            ])
            ->add('titre', TextType::class, [
                'label' => 'Titre de l\'annonce*',
                // 'data' => 'Titre de Test Annonce'
            ])
            ->add('lieu_travail', TextType::class, [
                'label' => 'Lieu de travail*',
                // 'data' => 'Lieu de Test Travail'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description du poste*',
                // 'data' => 'Description de Test Poste'
            ])
            ->add('diffusion', TextType::class, [
                'label' => 'Où avez-vous trouvé cette annonce ?',
                'required' => false,
                // 'data' => 'Réseau professionnel'
            ])
            ->add('salaire', TextType::class, [
                'label' => 'Salaire annuel*',
                // 'data' => '30000'
            ])
            ->add('lien_offre', UrlType::class, [
                'label' => 'Lien de l\'offre',
                'required' => false,
                // 'data' => 'https://www.example.com/offre'
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom du contact',
                'required' => false,
                // 'data' => 'John'
            ])
            ->add('nom', TextType::class, [
                'label' => 'Nom du contact',
                'required' => false,
                // 'data' => 'Doe'
            ])
            ->add('poste', TextType::class, [
                'label' => 'Quel est son poste ?',
                'required' => false,
                // 'data' => 'Ingénieur'
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => false,
                // 'data' => 'john.doe@example.com'
            ])
            ->add('telephone', TextType::class, [
                'label' => 'Téléphone',
                'required' => false,
                // 'data' => '0123456789'
            ])
            ->add('linkdin', UrlType::class, [
                'label' => 'Profil LinkedIn',
                'required' => false,
                // 'data' => 'https://www.linkedin.com/in/johndoe'
            ])
            ->add('date_candidature', DateType::class, [
                'label' => 'Date de candidature*',
                'data' => new \DateTime()
            ])
            ->add('cv', ChoiceType::class, [
                'label' => 'Avez-vous transmis votre CV ?*',
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                // 'data' => true
            ])
            ->add('lettre_motivation', ChoiceType::class, [
                'label' => 'Avez-vous transmis votre lettre de motivation*',
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                // 'data' => true
            ])
            ->add('date_relance', DateType::class, [
                'label' => 'Date de relance',
                'required' => false
            ])
            ->add('entretien', TextareaType::class, [
                'required' => false,
                'label' => 'Entretien',
                // 'data' => false
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'En cours' => 'En cours',
                    'Accepté' => 'Accepté',
                    'Refusé' => 'Refusé',
                ],
                'label' => 'Status',
                // 'data' => 'En cours'
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
