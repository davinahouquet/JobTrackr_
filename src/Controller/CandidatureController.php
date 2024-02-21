<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Entity\Referent;
use App\Entity\Entreprise;
use App\Entity\Candidature;
use App\Form\CandidatureType;
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
        // Create a new instance of Candidature entity
        $candidature = new Candidature();
        $offre = new Offre();
        $entreprise = new Entreprise();
        $referent = new Referent();

        // Create a form to add a new candidature
        // $form = $this->createForm(CandidatureType::class, $candidature);
        $form = $this->createForm(CompleteFormType::class);

        // Handle the form submission
        $form->handleRequest($request);

        // Check if the form is submitted and valid
        if ($form->isSubmitted() && $form->isValid()) {
            // Save the new candidature to the database
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($candidature);
            $entityManager->flush();

            // Redirect to a success page or any other page
            return $this->redirectToRoute('app_candidature');
        }

        // Render the form template
        return $this->render('candidature/complete.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
