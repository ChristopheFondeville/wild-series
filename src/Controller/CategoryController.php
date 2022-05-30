<?php

namespace App\Controller;

use App\Entity\Program;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CategoryRepository $categoryRepository): Response
    {

        $categorys = $categoryRepository->findAll();

        return $this->render('category/index.html.twig', [
            'categorys' => $categorys,
        ]);
    }

    #[Route('/{categoryName}', name: 'show', methods: ['GET'])]
    public function show(string $categoryName, CategoryRepository $categoryRepository, ProgramRepository $programRepository): Response
    {
        $category = $categoryRepository->findOneBy(['name' => $categoryName]);

        if (!$category) {
            throw $this->createNotFoundException("La catégorie n'existe pas");
            // the above is just a shortcut for:
            // throw new NotFoundHttpException('The product does not exist');
        }

        $programs = $programRepository->findBy(['category' => $category],null,3);

        return $this->render('category/show.html.twig', [
            'programs' => $programs,
            'category' => $category,
        ]);
    }
}
