<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/program', name: 'program_index')]
class ProgramController extends AbstractController
{
    #[Route('/', name: 'program')]
    public function index(): Response
    {
        return $this->render('program/index.html.twig', [
            'website' => 'Wild Series',
        ]);
    }

    #[Route('/', name: 'program_view')]
    public function show(): Response
    {
        return $this->render('program/index.html.twig', [

        ]);
    }
}
