<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Entity\Referent;
use App\Entity\Entreprise;
use App\Entity\Candidature;
// use App\Form\CandidatureType;
use App\Form\CompleteFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CandidatureController extends AbstractController
{
    #[Route('/candidature', name: 'app_candidature')]
    public function index(): Response
    {
        return $this->render('candidature/index.html.twig', [
            'controller_name' => 'CandidatureController',
        ]);
    }

    #[Route('/nouvelle/candidature', name:'new_candidature')]
    public function newCandidature(Request $request, EntityManagerInterface $entityManager): Response
    {
        $candidature = new Candidature();
        $entreprise = new Entreprise();
        $offre = new Offre();
        $referent = new Referent();

        $form = $this->createForm(CompleteFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer les données soumises dans le formulaire
            $data = $form->getData();

            // Affecter les valeurs des champs d'entreprise au nouvel objet Entreprise
            $entreprise->setNomEntreprise($data['nom_entreprise']);
            $entreprise->setLienEntreprise($data['lien_entreprise']);
            $entreprise->setAdresse($data['adresse']);
            $entreprise->setSiret($data['siret']);

            // Affecter les valeurs des champs d'offre au nouvel objet Offre
            $offre->setNumero($data['numero']);
            $offre->setTitre($data['titre']);
            $offre->setLieuTravail($data['lieu_travail']);
            $offre->setDescription($data['description']);
            $offre->setDiffusion($data['diffusion']);
            $offre->setSalaire($data['salaire']);
            $offre->setLienOffre($data['lien_offre']);

            // Associer l'offre et l'entreprise à la candidature
            // $candidature->setEntreprise($entreprise);
            $offre->setEntreprise($entreprise);
            $offre->setReferent($referent);
            $candidature->setOffre($offre);

            // Affecter les autres champs de la candidature
            $candidature->setDateCandidature($data['date_candidature']);
            $candidature->setCv($data['cv']);
            $candidature->setLettreMotivation($data['lettre_motivation']);
            $candidature->setDateRelance($data['date_relance']);
            $candidature->setEntretien($data['entretien']);
            $candidature->setStatus($data['status']);

            // Affecter les autres champs de la candidature
            $referent->setPrenom($data['prenom']);
            $referent->setNom($data['nom']);
            $referent->setPoste($data['poste']);
            $referent->setEmail($data['email']);
            $referent->setTelephone($data['telephone']);
            $referent->setLinkdin($data['linkdin']);

            // Flush les objets Entreprise, Offre et Candidature dans la base de données
            $entityManager->persist($entreprise);
            $entityManager->persist($offre);
            $entityManager->persist($candidature);
            $entityManager->persist($referent);
            $entityManager->flush();

            // Rediriger ou afficher un message de succès
            return $this->redirectToRoute('app_home');
        }

        // Rendu du formulaire
        return $this->render('candidature/complete.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/supprimer/candidature/{id}', name:'delete_candidature')]
    public function deleteCandidature(Candidature $candidature, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($candidature);
        $entityManager->flush();
    
        return $this->redirectToRoute('app_home');
    }
}
