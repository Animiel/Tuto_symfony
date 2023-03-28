<?php

namespace App\Controller;

use App\Entity\Entreprise;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;        //pourquoi pas doctrine/persistence comme dans vidéo ?

class EntrepriseController extends AbstractController
{
    #[Route('/entreprise', name: 'app_entreprise')]
    public function index(ManagerRegistry $doctrine): Response
    {
        // on récupère les entreprises de la BDD
        $entreprises = $doctrine->getRepository(Entreprise::class)->findAll();
        return $this->render('entreprise/index.html.twig', [
            'entreprises' => $entreprises,
        ]);
    }

    #[Route("/entreprise/add", name: "add_entreprise")]
    public function add(ManagerRegistry $doctrine, Entreprise $entreprise = null, Request $request): Response {
        $form = $this->createForm();
    }

    #[Route("/entreprise/{id}", name: "show_entreprise")]
    public function show() {
        $entreprise = "";
        return $this->render('entreprise/show.html.twig', [
            'entreprise' => $entreprise,
        ]);
    }
}
