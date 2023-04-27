<?php

namespace App\Controller;

use App\Entity\Arrivage;
use App\Entity\Intervention;
use App\Entity\Vehicule;
use App\Entity\VehiculePark;
use App\Form\InterventionType;
use App\Repository\InterventionRepository;
use App\Repository\VehiculeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/intervention', name: "app_intervention_")]
class InterventionController extends AbstractController
{
    #[Route('/', name: 'list')]
    public function index(InterventionRepository $repository): Response
    {
        $interventionList = $repository -> findAll();

        return $this->render('intervention/index.html.twig', [
            'interventionList' => $interventionList,
        ]);
    }

    #[Route('/add', name: "add")]
    public function addIntervention(Request $rqst) : Response {

        $intervention = new Intervention();
        $form = $this -> createForm(InterventionType::class, $intervention);
        $form -> handleRequest($rqst);


        return $this -> render('intervention/add.html.twig', [
            'interventionAdd' => $form -> createView()
        ]);
    }

}
