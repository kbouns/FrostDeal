<?php

namespace App\Controller;

use App\Entity\Deal;
use App\Entity\Categorie;
use App\Repository\DealRepository;
use App\Repository\CategorieRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private ManagerRegistry $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        // Recuperation de ManagerRegistry pour récupérer le repository
        $dealRepository = $this->managerRegistry->getRepository(Deal::class);
        $deals = $dealRepository->findAll();

        // Récupérer les catégories de la même manière
        $categorieRepository = $this->managerRegistry->getRepository(Categorie::class);
        $categories = $categorieRepository->findAll();

        return $this->render('home/index.html.twig', [
            'deals' => $deals,
            'categories' => $categories,
        ]);
    }
}
