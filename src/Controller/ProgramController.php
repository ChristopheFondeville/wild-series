<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/program', name: 'program_')]
class ProgramController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('program/index.html.twig', [
            'program' => 'Program page',
        ]);
    }

    #[Route('/{id<\d+>}', name: 'view', methods: ['GET'])]
    public function show($id): Response
    {
        return $this->render('program/show.html.twig', [
            'id' => $id,
        ]);
    }
}
