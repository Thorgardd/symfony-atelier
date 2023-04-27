<?php

namespace App\Controller;

use App\Repository\InterventionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/intervention', name: 'app_intervention_')]
class InterventionController extends AbstractController
{
    #[Route('/', name: 'list')]
    public function index(InterventionRepository $interventionRepository): Response
    {
        $intervention = $interventionRepository -> interventionComplexQuery();
        return $this->render('intervention/index.html.twig', [
            'interventions' => $intervention,
        ]);
    }
}
