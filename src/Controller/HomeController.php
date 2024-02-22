<?php

namespace App\Controller;

use App\Entity\Candidature;
use App\Repository\CandidatureRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(CandidatureRepository $candidatureRepository): Response
    {
        $candidatures = $candidatureRepository->findAll();
        return $this->render('home/index.html.twig', [
            'candidatures' => $candidatures
        ]);
    }
}
