<?php

namespace App\Controller;

use App\Entity\Intervention;
use App\Form\InterventionAddType;
use App\Repository\InterventionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function PHPUnit\Framework\throwException;

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

    #[Route('/add', name: "add")]
    public function addIntervention(InterventionRepository $interventionRepository, ?Intervention $interv) : Response {

        if ($interv) {
            $interventionRepository -> save($interv);
        }
        return $this -> render('intervention/add_intervention.html.twig', [
            'formAddInterv' => "null"
        ]);
    }
}
