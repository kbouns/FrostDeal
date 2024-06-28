<?php


namespace App\Controller;

use App\Entity\Deal;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface; // Importez EntityManagerInterface

class HomeController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $dealRepository = $this->entityManager->getRepository(Deal::class);
        $deals = $dealRepository->findDealsAscending();

        return $this->render('home/index.html.twig', [
            'deals' => $deals,
        ]);
    }
}
