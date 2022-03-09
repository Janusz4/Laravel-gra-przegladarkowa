<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    #[Route('/game', name: 'game')]
    public function index(): Response
    {
        return $this->render('game/index.html.twig', [
            'controller_name' => 'GameController',
        ]);
    }

    #[Route('/materials', name: 'materials')]
    public function materials(): Response
    {
        return $this->render('game/materials.html.twig', [
            'controller_name' => 'GameController',
        ]);
    }

    #[Route('/castle', name: 'castle')]
    public function castle(): Response
    {
        return $this->render('game/castle.html.twig', [
            'controller_name' => 'GameController',
        ]);
    }
}
